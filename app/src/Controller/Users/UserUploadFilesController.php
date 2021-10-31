<?php

namespace App\Controller\Users;

use App\Entity\Files;
use App\Enum\HttpMessage;
use App\Exception\IncorrectExtension;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/api')]
class UserUploadFilesController extends AbstractController
{
    public const CORRECT_EXTENSION = ['image/png', 'image/jpeg', 'image/jpg'];


    #[Route('/upload/files', methods: ['POST'])]
    final public function indexAction(
        Request $request,
        SluggerInterface $slugger,
        EntityManagerInterface $entityManager
    ): JsonResponse {

        /** @var UploadedFile $brochureFile */
        $brochureFile = $request->files->get('files');

        if (!in_array($brochureFile->getClientMimeType(), self::CORRECT_EXTENSION)) {
            throw new IncorrectExtension(HttpMessage::INCORRECT_EXT);
        }

        if ($brochureFile) {
            $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);

            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->getClientOriginalName();

            try {
                $brochureFile->move(
                    $this->getParameter('files_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            $files = new Files($newFilename, $this->getUser());

            $entityManager->persist($files);
            $entityManager->flush();
        }
        

        return $this->json('Successful upload files :D');
    }
}
