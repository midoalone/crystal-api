<?php

namespace App\Containers\User\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Containers\User\UI\API\Requests\CreateAdminRequest;
use App\Containers\User\UI\API\Requests\DeleteUserRequest;
use App\Containers\User\UI\API\Requests\FindUserByIdRequest;
use App\Containers\User\UI\API\Requests\ForgotPasswordRequest;
use App\Containers\User\UI\API\Requests\GetAllUsersRequest;
use App\Containers\User\UI\API\Requests\GetAuthenticatedUserRequest;
use App\Containers\User\UI\API\Requests\RegisterUserRequest;
use App\Containers\User\UI\API\Requests\ResetPasswordRequest;
use App\Containers\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\User\UI\API\Transformers\UserPrivateProfileTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Events\SendSMSEvent;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

/**
 * Class Controller.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class Controller extends ApiController {

  /**
   * @param \App\Containers\User\UI\API\Requests\RegisterUserRequest $request
   *
   * @return  mixed
   */
  public function registerUser( RegisterUserRequest $request ) {
    $user = Apiato::call( 'User@RegisterUserAction', [ new DataTransporter( $request ) ] );

//    $code = rand( 11111, 99999 );
//
//    $user->update( [
//      'verification_code' => $code
//    ] );
//
//    // Send sms
//    App::make( Dispatcher::class )->dispatch( new SendSMSEvent( $this->translatable("Your verification code is", "كود التفعيل الخاص بك هو") . " \n " . $code, "966{$user->mobile}" ) );

    return $this->transform( $user, UserTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\CreateAdminRequest $request
   *
   * @return  mixed
   */
  public function createAdmin( CreateAdminRequest $request ) {
    $admin = Apiato::call( 'User@CreateAdminAction', [ new DataTransporter( $request ) ] );

    return $this->transform( $admin, UserTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\UpdateUserRequest $request
   *
   * @return  mixed
   */
  public function updateUser( UpdateUserRequest $request ) {

    // Change password
    if ( $request->old_password ) {
      $userObject = User::find( $request->id );
      if ( ! Hash::check( $request->old_password, $userObject->password ) ) {
        throw new CreateResourceFailedException( "Old password is not correct" );
      }
    }

    $user = Apiato::call( 'User@UpdateUserAction', [ new DataTransporter( $request ) ] );

    return $this->transform( $user, UserTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\DeleteUserRequest $request
   *
   * @return  \Illuminate\Http\JsonResponse
   */
  public function deleteUser( DeleteUserRequest $request ) {
    Apiato::call( 'User@DeleteUserAction', [ new DataTransporter( $request ) ] );

    return $this->noContent();
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\GetAllUsersRequest $request
   *
   * @return  mixed
   */
  public function getAllUsers( GetAllUsersRequest $request ) {
    $users = Apiato::call( 'User@GetAllUsersAction' );

    return $this->transform( $users, UserTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\GetAllUsersRequest $request
   *
   * @return  mixed
   */
  public function getAllClients( GetAllUsersRequest $request ) {
    $users = Apiato::call( 'User@GetAllClientsAction' );

    return $this->transform( $users, UserTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\GetAllUsersRequest $request
   *
   * @return  mixed
   */
  public function getAllAdmins( GetAllUsersRequest $request ) {
    $users = Apiato::call( 'User@GetAllAdminsAction' );

    return $this->transform( $users, UserTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\FindUserByIdRequest $request
   *
   * @return  mixed
   */
  public function findUserById( FindUserByIdRequest $request ) {
    $user = Apiato::call( 'User@FindUserByIdAction', [ new DataTransporter( $request ) ] );

    return $this->transform( $user, UserTransformer::class );
  }

  /**
   * @param GetAuthenticatedUserRequest $request
   *
   * @return mixed
   */
  public function getAuthenticatedUser( GetAuthenticatedUserRequest $request ) {
    $user = Apiato::call( 'User@GetAuthenticatedUserAction' );

    return $this->transform( $user, UserPrivateProfileTransformer::class );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\ResetPasswordRequest $request
   *
   * @return  \Illuminate\Http\JsonResponse
   */
  public function resetPassword( ResetPasswordRequest $request ) {
    Apiato::call( 'User@ResetPasswordAction', [ new DataTransporter( $request ) ] );

    return $this->noContent( 204 );
  }

  /**
   * @param \App\Containers\User\UI\API\Requests\ForgotPasswordRequest $request
   *
   * @return  \Illuminate\Http\JsonResponse
   */
  public function forgotPassword( ForgotPasswordRequest $request ) {
    Apiato::call( 'User@ForgotPasswordAction', [ new DataTransporter( $request ) ] );

    return $this->noContent( 202 );
  }

}
