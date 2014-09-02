<?php

class ProfileController extends BaseController 
{
        public function  render()
        {
            $profileModel =  new ProfileModel();
            $data         =  $profileModel->profile();
            return View::make('app.profile', $data);
        }
}
