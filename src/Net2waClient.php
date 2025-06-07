<?php
namespace Net2wa;

class Net2waClient {
    private $apiKey;
    private $baseUrl = 'https://api.mail2wa.it/';

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    private function sendRequest(string $action, string $method = 'GET', array $body = []): array {
        $url = $this->baseUrl . '?action=' . $action . '&apiKey=' . $this->apiKey;

        $options = [
            'http' => [
                'method'  => $method,
                'header'  => "Content-Type: application/json\r\n",
                'content' => $method === 'POST' ? json_encode($body) : null
            ]
        ];

        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            return ['success' => false, 'error' => 'Request failed'];
        }

        return json_decode($response, true);
    }

    public function sendText(string $to, string $message): array {
        return $this->sendRequest('send', 'POST', [
            'to' => $to,
            'message' => $message
        ]);
    }

    public function sendMedia(string $to, string $base64File, string $fileName, string $fileType, string $message = ''): array {
        return $this->sendRequest('sendMedia', 'POST', [
            'to' => $to,
            'fileContent' => $base64File,
            'fileName' => $fileName,
            'fileContentType' => $fileType,
            'message' => $message
        ]);
    }

    public function getCredit(): array {
        return $this->sendRequest('credit');
    }

    public function getStatus(): array {
        return $this->sendRequest('status');
    }

    public function restartUser(): array {
        return $this->sendRequest('restart');
    }

    public function disconnectUser(): array {
        return $this->sendRequest('disconnect');
    }
}
