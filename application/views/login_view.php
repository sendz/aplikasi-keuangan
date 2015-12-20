<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php
      echo $this->config->item('site_name');
      foreach ($pengaturan as $pengaturan) {
        echo " " . $pengaturan->namasekolah;
      }
    ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="row">
      <div class="col s12 center">
        <h1>Login</h1>
      </div>
      <div class="col s12">
        <?php echo form_open('verifylogin'); ?>
        <div class="col s4 offset-s4">
            <label for="username">Username:</label>
            <input type="text" size="20" id="username" name="username"/>
        </div>
        <div class="col s4 offset-s4">
          <label for="password">Password:</label>
          <input type="password" size="20" id="passowrd" name="password"/>
        </div>
        <div class="input-field col s4 offset-s4">

          <input type="submit" value="Login" class="btn"/>
        </div>
          <br/>
          <br/>
        </form>
      </div>
    </div>
 </body>
</html>
