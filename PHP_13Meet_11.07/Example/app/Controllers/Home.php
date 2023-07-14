<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data["title"] = "hello";
        $data["text"]= "Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptatum praesentium dolorum eveniet temporibus quibusdam reiciendis sed dignissimos excepturi placeat, eius, hic aspernatur sint ex harum odit cupiditate commodi nisi fugiat! Repellat unde aliquam hic? Nulla a libero culpa, perspiciatis sit dolore iure, officiis quos blanditiis reprehenderit accusamus earum laborum!";
        $data["countries"]= array("Andorra","Ukraine","Poland","USA");

        return view('page1',$data);
    }
    public function cities(){
        $db = db_connect();
        $res = $db->query("Select * From Cities");
        echo "<h2>Cities</h2>";
        echo "<table><tbody>";
        foreach($res->getResult("array") as $elem)
        {
            echo "<tr>";
            echo "<td>$elem[Id]</td>";
            echo "<td>$elem[CountryId]</td>";
            echo "<td>$elem[City]</td>";
            echo "<td><a href='/home/city?id=$elem[Id]'>Details</a></td>";
            echo "<td><a href='/home/info/$elem[Id]'>Info</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
    public function city(){
        $id = $this->request->getGet("id");
        $db = db_connect();
        $res = $db->query("SELECT C.City,Co.Country FROM Cities C LEFT Join Countries Co on C.CountryId=Co.Id Where C.Id=?",[$id]);
        $elem = $res->getFirstRow("array");
        // var_dump($elem);
        
        // foreach($res->getResult("array") as $elem)
        // {
        //     echo "<h2>$elem[City]</h2>";
        //     echo "<h3>$elem[Country]</h3>";
        // }
        return view("header").view("city",$elem).view("footer");
    }
    public function info($id){
        $db = db_connect();
        $res = $db->query("SELECT C.City,Co.Country FROM Cities C LEFT Join Countries Co on C.CountryId=Co.Id Where C.Id=?",[$id]);
        $elem = $res->getFirstRow("array");
        // var_dump($elem);
        
        // foreach($res->getResult("array") as $elem)
        // {
        //     echo "<h2>$elem[City]</h2>";
        //     echo "<h3>$elem[Country]</h3>";
        // }
        return view("header").view("city",$elem).view("footer");
    }
}
