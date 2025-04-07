<?php
namespace App\Core;

trait LoggerTrait {
    public function log(string $message): void {
        file_put_contents('app.log', "[" . date('Y-m-d H:i:s') . "] $message" . PHP_EOL, FILE_APPEND);
    }
}
