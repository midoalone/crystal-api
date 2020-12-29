<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateUserByCredentialsTask extends Task {

  protected $repository;

  public function __construct( UserRepository $repository ) {
    $this->repository = $repository;
  }

  /**
   * @param bool $isClient
   * @param array $data
   *
   * @return  mixed
   */
  public function run(
    array $data,
    bool $isClient = true
  ): User {

//    try {

      // create new user
      $user = $this->repository->create( array_merge( $data, [
        'password'  => Hash::make( $data['password'] ),
        'is_client' => $isClient,
      ] ) );

      if(request('source') == "odoo") {
        $user->phone_verified = 1;
        $user->save();
      }

      // Create Odoo client
      if ( request( "odoo" ) == "YES" ) {
        $baseUrl = "https://plush.nvis-it.com";
        $client  = new Client( [ "base_uri" => $baseUrl ] );

        $webLogin = $client->post( "/web/session/authenticate", [
          'json' => [
            "params" => [
              'db'       => 'plush-live',
              'login'    => "apiuser",
              'password' => "abc123",
            ]
          ]
        ] );

        $response   = json_decode( $webLogin->getBody()->getContents() );
        $session_id = $response->result->session_id;

        $fields = [
          "private" => "Private Sector",
          "government" => "Government Sector",
          "student" => "Student",
          "none" => "Other",
        ];

        if(!isset($data['work_name'])) {
          $data['work_name'] = '';
        }

        if(!isset($data['birth_date'])) {
          $data['birth_date'] = '';
        }

        $createCustomer = $client->post( "/customer", [
          'headers' => [
            'Content-type' => 'application/json; charset=utf-8',
            'Accept'       => 'application/json',
            'X-Openerp'    => $session_id,
            'Cookie'       => "session_id=$session_id"
          ],
          'json'    => [
            "params" => [
              "name"          => $data['name'] . " " . $data['last_name'],
              "mobile"        => $data['mobile'],
              "email"         => $data['email'],
              "birthday_date" => $data['birth_date'],
              "work_field"    => $fields[$data['work_field']],
              "work_name"     => $data['work_name'],
            ]
          ]
        ] );

        $response = json_decode( $createCustomer->getBody()->getContents() );
//        throw new UpdateResourceFailedException($response->result->id);
      }

//    } catch ( Exception $e ) {
//      throw ( new CreateResourceFailedException() )->debug( $e );
//    }

    return $user;
  }

}
