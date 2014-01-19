<?php Session::Init(); //var_dump(Token::Check($_POST['token'])); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/style/style.css" />
      <title>-Site-nimi-</title>
   </head>
   <body>
        <div id="header"><div id="logo"><h2><a href="index">-Site-nimi-</a></h2></div>
             <div id ="menu">                
                <?php if ( Session::Get('id') === NULL ) { ?>
                 <div id="login_form"><form method="POST" action="<?php echo URL; ?>login/userLogin">
                    <div><input class="login_form" type="text" name="uname" placeholder="Kasutajatunnus" />
                    <input class="login_form" type="password" name="upass" placeholder="Parool" />
                    <input class="login_form" type="hidden" name="token" value="<?php echo Token::Generate(); ?>" autocomplete="off" />
                    <input class="login_form" type="submit" value="Logi sisse" /></div>
                    </form>
               </div>
                <?php } else { ?>
                 <a href="<?php echo URL; ?>user/logout">Logi välja</a>
                <?php } ?></div></div>
        <div id="bid_wrapper"><div id="navbar">
             <?php if ( Session::Get('id') !== NULL ) { ?>
                     <div class="navbar_menu"><a href="index">Haldus</a></div>	
					 /* Lisa oma lingid */	
              <?php } ?>
        </div><div id="wrapper">