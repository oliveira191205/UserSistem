<?php
class Log 
{
    public array $logs = [];
    public function __construct()
    {
    // apenas para não dar erro
    }


    public function logSucess(string $message, string $context = "") : string 
    {
        $this->log("Sucesso", $message, $context);
        return $message;
    }

    public function logError (string $message, string $context = ""): string
    {
        $this->log("Erro", $message, $context);
        return $message;
    } 

    public function log(string $type, string $message, string $context= ""): void
    {
        $logMessage = "{$type}: {$message}";
        if (!empty($context)){
            $logMessage .= " | Contexto: {$context}";
        }
        $this->logs[] = $logMessage; // armazena os logs
    }
}

?>