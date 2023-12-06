<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function Tours()
    {
        $city = $this->request->getGet("City");
        $stars = $this->request->getGet("Stars");
        $db = db_connect();
        $arr = array();
        if ($city != "" && $stars != "") {
            $res = $db->query("SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id WHERE Ci.City='$city' and H.Stars=$stars");
            $message = "Hotels in $city with $stars ".($stars == 1 ? "star" : "stars");
        } else if ($city != "") {
            $res = $db->query("SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id WHERE Ci.City='$city'");
            $message = "Hotels in $city";
        } else if ($stars != "") {
            $res = $db->query("SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id WHERE  H.Stars=$stars");

            $message = "Hotels with $stars ".($stars == 1 ? "star" : "stars");
        } else {
            $res = $db->query("SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id");
            $message = "";
        }
        $arr["message"] = $message;
        $arr["city"] = $city;
        $arr["stars"] = $stars;
        if ($res->getNumRows() != 0) {
            $row = $res->getFirstRow("array");
            do {

                $buf = $db->query("SELECT I.ImagePath FROM Hotels H left join Images I on I.HotelId=H.Id where H.Id=$row[Id] LIMIT 1");
                $image = $buf->getFirstRow("array");
                if ($image["ImagePath"] != null) {
                    if (!file_exists($image["ImagePath"]))
                        copy("D:/OSPanel/domains/php/TravelAgency/$image[ImagePath]", $image["ImagePath"]);
                    $row["image"] = "$image[ImagePath]";
                } else
                    $row["image"] = "Images/nf.jpg";
                $arr["hotels"][] = $row;
            } while ($row = $res->getNextRow("array"));
        }
        $res = $db->query("SELECT * FROM Cities");
        $row = $res->getFirstRow();
        do {
            $arr["Cities"][] = $row->City;
        } while ($row = $res->getNextRow());
        return view("Header").view("Tours", $arr);
    }
}
