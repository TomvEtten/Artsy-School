<?php

class LikeController extends Controller {

    public function like(Profile $profile) {
        $profile->aantalLikes += 1;
    }

}
