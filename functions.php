<?php

declare(strict_types=1);
include_once 'User.php';

function getUsers()
{
  $jsondata = file_get_contents(__DIR__. '/users.json');

  $users_array = json_decode($jsondata, true);

  $users = [];

  foreach ($users_array as $user_data) {
    $user = new User(
      $user_data['id'],
      $user_data['name'],
      $user_data['username'],
      $user_data['email'],
      $user_data['phone'],
      $user_data['website'],
    );

    $users[] = $user;
  }

  return $users;
}

function getUserById(int $id)
{
  $users = getUsers();
  foreach($users as $user){
    if ($id === $user->id){
      return $user;
    }
  }
  return null;
}

function updateUser(array $post_data,int $user_id)
{
  $users = getUsers();

  foreach ($users as $user){
    if ($user->id === $user_id){
      $user->name = $post_data['name'];
      $user->username = $post_data['username'];
      $user->email = $post_data['email'];
      $user->phone = $post_data['phone'];
      $user->website = $post_data['website'];
    }
  }

  file_put_contents(__DIR__. '/users.json',json_encode($users));
}

function deleteUser($id)
{
}
