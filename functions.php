<?php

declare(strict_types=1);
include_once __DIR__ . '/users/User.php';

function getUsers()
{
  $jsondata = file_get_contents(__DIR__ . '/users/users.json');

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
  foreach ($users as $user) {
    if ($id === $user->id) {
      return $user;
    }
  }
  return null;
}

function updateUser(array $post_data, int $user_id)
{
  $users = getUsers();

  foreach ($users as $user) {
    if ($user->id === $user_id) {
      $user->name = $post_data['name'];
      $user->username = $post_data['username'];
      $user->email = $post_data['email'];
      $user->phone = $post_data['phone'];
      $user->website = $post_data['website'];
    }
  }

  file_put_contents(__DIR__ . '/users/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function deleteUser($user_id)
{
  $json_data = file_get_contents(__DIR__ . '/users/users.json');
  $users_array = json_decode($json_data, true);

  // Find the index of the user to be removed in the array
  $index = -1;
  foreach ($users_array as $key => $user_data) {
    if ($user_data['id'] == $user_id) {
      $index = $key;
      break;
    }
  }

  if ($index !== -1) {
    // Remove the user from the array using the found index
    array_splice($users_array, $index, 1);

    // Encode the updated array back to JSON format
    $json_data = json_encode($users_array, JSON_PRETTY_PRINT);

    // Write the updated JSON data back to the file
    file_put_contents(__DIR__ . '/users/users.json', $json_data);
    
    return true; // User removed successfully
  }

  return false; // User not found
}


function createUser($user_data){
  $user = new User(
    (int) $user_data['id'],
    $user_data['name'],
    $user_data['username'],
    $user_data['email'],
    $user_data['phone'],
    $user_data['website']
  );

  $users = getUsers();
  $users[] = $user;
  
  $json_data = json_encode($users, JSON_PRETTY_PRINT);
  
  // Write the updated JSON data back to the file
  file_put_contents(__DIR__ . '/users/users.json', $json_data);
}
