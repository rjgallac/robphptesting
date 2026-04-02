<?php

if(isset($_GET['test'])) {
    echo "Test parameter is set to: " . $_GET['test'];
} else {
    echo "Test parameter is not set.";
}