<?php

try {
    echo csrf_field();
} catch (Exception $e) {
}