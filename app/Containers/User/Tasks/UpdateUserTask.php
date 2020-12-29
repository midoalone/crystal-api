<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\InternalErrorException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UpdateUserTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserTask extends Task {

  protected $repository;

  public function __construct( UserRepository $repository ) {
    $this->repository = $repository;
  }

  /**
   * @param $userData
   * @param $userId
   *
   * @return mixed
   * @return  \App\Containers\User\Models\User
   * @throws NotFoundException
   * @throws UpdateResourceFailedException
   *
   * @throws InternalErrorException
   */
  public function run( $userData, $userId ): User {
    if ( empty( $userData ) ) {
      throw new UpdateResourceFailedException( 'Inputs are empty.' );
    }

    $user = $this->repository->update( $userData, $userId );

    if ( request()->has( "branches" ) ) {
      $user->branches()->sync( request( "branches" ) );
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
        "private"    => "Private Sector",
        "government" => "Government Sector",
        "student"    => "Student",
        "none"       => "Other",
      ];

      $params = [
        "name"          => $userData['name'] . " " . $userData['last_name'],
        "email"         => $userData['email'],
      ];

      if ( isset( $userData['birth_date'] ) ) {
        $params['birthday_date'] = $userData['birth_date'];
      }

      if ( isset( $userData['work_name'] ) ) {
        $params['work_name'] = $userData['work_name'];
      }else{
        $params['work_name'] = '';
      }

      if ( isset( $userData['work_field'] ) ) {
        $params['work_field'] = $fields[ $userData['work_field'] ];
      }

      $createCustomer = $client->post( "/customer/{$userData['mobile']}/update", [
        'headers' => [
          'Content-type' => 'application/json; charset=utf-8',
          'Accept'       => 'application/json',
          'X-Openerp'    => $session_id,
          'Cookie'       => "session_id=$session_id"
        ],
        'json'    => [
          "params" => $params
        ]
      ] );

      $response = json_decode( $createCustomer->getBody()->getContents() );
//      throw new UpdateResourceFailedException( json_encode($response) );
    }

    try {

    } catch ( ModelNotFoundException $exception ) {
      throw new NotFoundException( 'User Not Found.' );
    } catch ( Exception $exception ) {
      throw new InternalErrorException();
    }

    return $user;
  }

}
