<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat.{userid}', function ($user, $userid) {
    return (int) $user->id === (int) $userid;
});

Broadcast::channel('typing.{userid}', function ($user, $userid) {
    return true;
});