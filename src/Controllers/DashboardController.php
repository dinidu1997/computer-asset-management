<?php
// File: src/Controllers/DashboardController.php

namespace App\Controllers;

class DashboardController
{
    public function __construct()
    {
        echo "DashboardController loaded successfully!";
    }

    public function index()
    {
        echo "Dashboard index action called!";
    }
}
