<?php
namespace App\Models;

enum Permissions: int {
    case System = 0;
    case Administrator = 1;
    case User = 2;
}
