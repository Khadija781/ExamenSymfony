<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
	private $stringService;
	private $fileName;

	public function __construct(StringService $stringService)
	{
		$this->stringService = $stringService;
	}

	public function getFileName():string
	{
		return $this->fileName;
	}

	public function upload(UploadedFile $file, string $directory):void
	{
		// récupérer un nom aléatoire pour le fichier
		$this->fileName = "{$this->stringService->getToken()}.{$file->guessClientExtension()}";
		//dump($fileName);

		// transfert
		$file->move($directory, $this->fileName);
	}

	public function remove(string $directory, string $fileName):void
	{
		$destination = "$directory/$fileName";
		unlink($destination);
	}
}








