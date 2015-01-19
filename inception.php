<html>
    <head>
        <title>Installation</title>
        <style>
            html{
                background: #f9f9f9;
                margin:0;
            }
            table{
                margin-left: 30%;
                background: #eee;
                padding: 30px;
                
            }
           
            td{
                padding: 10px; 
                color: #333;
            }
            #text{
                background: #f3f3f3;
                box-shadow: 0px 0px 6px 1px #888 inset;
               
                border:0;
                padding:10px;
                width:240px;
                -webkit-transition:all 0.3s linear;
                -moz-transition:all 1s ease-out;
            }
            #text:focus{
                outline:0;
                 box-shadow: 0px 0px 2px 1px #aaa inset;
              
            }
            #button{
                background: #444;
                border: 0;
                width:100%;
                cursor: pointer;
                padding:10px;
                color:#f5f5f5;
                -webkit-transition:all 0.2s ease-in;
                -moz-transition:all 1s ease-out;
                box-shadow: 0px 0px 8px 1px rgba(0,0,0,0.3) inset;
                border-radius: 5px;
                text-shadow: 1px #666;
            }
            #button:hover{
                outline: 0;
                background: #222;
                box-shadow: 0px 0px 3px 1px rgba(0,0,0,0.3) inset;
            }
        </style>
    </head>
    <body>

        <?php
        /*
         * To change this template, choose Tools | Templates
         * and open the template in the editor.
         */
        mysql_connect("localhost", "root", "") or die(mysql_error());
        $dbname = @$_POST['dbname'];
        $user = @$_POST['user'];
        $pass = @$_POST['pass'];
        $email = @$_POST['email'];
        $path = @$_POST['site_name'];
        $file= __DIR__; 
        $file= explode("\\", $file); 
        $path= end($file); 
        $filen='libs/config.php';
        $content='<?php
$value="builder";
define("dbname","'.$dbname.'");
$path="http://localhost/'.$path.'/";
define("URL", $path);
?>
';
        if (isset($dbname)) {
            $sql = "create database " . $dbname;
            mysql_query($sql) or die("Database error");
            mysql_select_db($dbname);
            file_put_contents($filen,$content);
            $sql = "create table cms(page varchar(50) primary key,title varchar(50),content longtext,login tinyint(1),menu tinyint(1),flag tinyint(1))";
            mysql_query($sql) or die("cms table already exist");
            $sql = "insert into cms values('index','Index','Add your contents here.','','',1)";
            mysql_query($sql) or die("cms insertion affected");
             $sql = "insert into cms values('profile','Profile','^profile^','','',1)";
            mysql_query($sql) or die("cms insertion affected");
             $sql = "insert into cms values('boot','Login','^login^','','1',1)";
            mysql_query($sql) or die("cms insertion affected");
            $sql = "create table meta(page varchar(50),part1 varchar(50),content1 longtext,part2 varchar(50),content2 longtext)";
            mysql_query($sql) or die("meta table already exist");
            $sql = "create table wapps(page varchar(50),type varchar(50),content longtext,width int(3),flag tinyint(1))";
            mysql_query($sql) or die("wapps table already exist");
            $sql = "insert into wapps values('index','header','','',1)";
            mysql_query($sql) or die("wapps insertion affected");
            $sql = "create table users(id int primary key AUTO_INCREMENT, user varchar(50),pass varchar(50),rank varchar(10),email varchar(255),log tinyint(1))";
            mysql_query($sql) or die("users table already exist");
            if(isset($user)&&isset($pass)){
                $pass=  md5($pass);
                 $sql = "insert into users values('','$user','$pass','admin','$email',1)";
            mysql_query($sql) or die("cms insertion affected");
            }
            header('Location:index');
            
        }
        ?>
        <h1 align="center">Wabsters</h1>

        <form action="" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>
                            Website Name:
                        </td>
                        <td>
                            <input id="text" type="text" name="site_name" value="<?php $file= __DIR__; $file= explode("\\", $file); echo end($file);  ?>" required disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Database Name:
                        </td>
                        <td>
                            <input id="text" type="text" name="dbname" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Admin Name:
                        </td>
                        <td>
                            <input id="text" type="text" name="user" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input id="text" type="password" name="pass" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E-mail:
                        </td>
                        <td>
                            <input id="text" type="email" name="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Site!" id="button">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

    </body>
</html>