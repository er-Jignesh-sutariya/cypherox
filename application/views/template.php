<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Cypherox Task</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://bootswatch.com/5/pulse/bootstrap.css" rel="stylesheet" />
      <link href="https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
      <link href="https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css" rel="stylesheet" />
      <link href="https://bootswatch.com/_assets/css/custom.min.css" rel="stylesheet" />
      <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" />
   </head>
   <body>
         <div class="container">
            <div class="col-6 offset-3">
               <nav class="navbar navbar-dark bg-secondary shadow">
                  <div class="container">
                     <div class="row">
                        <div class="col-6">
                           <button class="navbar-toggler" type="button">
                              <span class="navbar-toggler-icon"></span>
                           </button>
                        </div>
                        <div class="col-6">
                           <a class="navbar-brand nav-brand" href="javascript:;">Website todo</a>
                        </div>
                     </div>
                  </div>
               </nav>
               <div class="card border-primary mt-4 shadow">
                  <div class="card-body">
                     <?= $this->session->error ? '<div class="alert alert-danger">'.$this->session->error.'</div>' : '' ?>
                     <?= $this->session->success ? '<div class="alert alert-success">'.$this->session->success.'</div>' : '' ?>
                     <?= $contents; ?>
                  </div>
               </div>
            </div>
         </div>
         <input type="hidden" name="base_url" value="<?= base_url(); ?>" />
         <script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
         <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
         <script src="<?= base_url('assets/js/script.js'); ?>"></script>
   </body>
</html>