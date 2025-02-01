<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/users', action: function(): AnonymousResourceCollection {
    return UserResource::collection(resource: User ::all());
});
