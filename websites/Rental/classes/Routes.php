<?php
namespace classes;
//Interface specificies with methods and class must implement.
interface Routes {
    public function getRoutes(): array;
    public function getAuthentication(): \classes\Authentication;
    public function checkPermission($permission): bool;
}