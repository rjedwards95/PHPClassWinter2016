<?php

$id =filter_input(INPUT_GET,'id');

$results = pullData($id, $_SESSION['id']);