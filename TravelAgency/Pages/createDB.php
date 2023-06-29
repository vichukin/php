<?
    include_once("functions.php");
    $connect = connect_To_DB("localhost","root");
    $ct1 = "CREATE TABLE Countries(
        Id INT NOT NULL auto_increment primary key,
        Country varchar(36) not null) default charset='utf8'";
    $ct2 = "CREATE TABLE Cities(
        Id INT NOT NULL auto_increment primary key,
        City varchar(36) not null,
        CountryId int not null,
        foreign key(CountryId) references Countries(Id)
        ON DELETE CASCADE) default charset='utf8'";
    $ct3 = "CREATE TABLE Hotels(
        Id INT NOT NULL auto_increment primary key,
        HotelName varchar(64) not null,
        Description text,
        Price double,
        Stars int ,
        CityId int not null,
        foreign key(CityId) references Cities(Id) ON DELETE CASCADE,
        Constraint CHK_HotelsStars Check (Stars>0 and Stars<6) ) default charset='utf8'";
    $ct4 = "CREATE TABLE Images(
        Id INT NOT NULL auto_increment primary key,
        ImagePath varchar(255) not null,
        HotelId int not null,
        foreign key(HotelId) references Hotels(Id) 
        ON DELETE CASCADE) default charset='utf8'";
    $ct5 = "CREATE TABLE Roles(
        Id INT NOT NULL auto_increment primary key,
        RoleName varchar(32) not null UNIQUE) default charset='utf8'";
    $ct6 = "CREATE TABLE Users(
        Id INT NOT NULL auto_increment primary key,
        Login varchar(64) Unique not null,
        Email varchar(255) not null,
        Passwrd varchar(64) not null,
        Photo mediumblob,
        Discount double ,
        RoleId int not null,
        foreign key(RoleId) references Roles(Id)
        ON DELETE CASCADE
        ) default charset='utf8'";
    
    // $arr = array("Countries"=>$ct1,"Cities"=>$ct2,"Hotels"=>$ct3,"Images"=>$ct4,"Roles"=>$ct5,"Users"=>$ct6);
    $arr = array("Users"=>$ct6);
    foreach($arr as $key=>$val)
    {
        $connect->query($val);
        $err = $connect->errno;
        if($err)
            echo"<div class='alert alert-dunger'>Db error $err. in $key table </div>";
    }
?>