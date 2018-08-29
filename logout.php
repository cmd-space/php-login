<?php

// destroy session and redirect to index.php
try {
    session_start();
    // destroy all traces of user in session
    session_destroy();
    // redirect to index with message
    header('Location: index.php?message=You have successfully logged out. Come back again soon!');
} catch (Exception $e) {
    echo "We could not log you out as a result of " . $e . ".. Please try again in just a bit.";
}