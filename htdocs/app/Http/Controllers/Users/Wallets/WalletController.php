<?php

namespace App\Http\Controllers\Users\Wallets;

use App\Contracts\Users\Wallets\Services\WalletServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Wallets\WalletRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class WalletController  extends Controller
{
    /**
     * TransferController constructor.
     *
     * @param WalletServiceInterface $walletService
     */
    public function __construct(
        WalletServiceInterface $walletService
    ) {
        $this->walletService = $walletService;
    }

    /**
     * @param WalletRequest $transactionRequest
     * @return JsonResponse
     */
    public function deposit(WalletRequest $request): JsonResponse
    {

        try {
            $dados = $request->getParams()->all();

            /** @var WalletEntity $entidade */
            $entidade = $this->walletService->deposit($dados);

            if ($entidade) {
                //gerar um log de transaferencia
            }

            return response()->json(
                [
                    "codigo" => Response::HTTP_CREATED,
                    "descricao" => "Valor depositado com sucesso.",
                    "money" => $entidade->getMoney(),
                    "tranferId" => $entidade->getId(),
                ],
                Response::HTTP_CREATED
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => 'Não foi possível fazer a transferencia no momento.']);
        }
    }

    /**
     * /**
     * @param \App\Http\Requests\Users\Wallets\WalletRequest $request
     * @return \App\Http\Controllers\Users\Wallets\Illuminate\Http\JsonResponse
     */
    public function balance(WalletRequest $request ): JsonResponse
    {
        try {
            $dados = $request->getParams()->all();

            /** @var WalletEntity $entidade */
            $entidade = $this->walletService->balance($dados);

            return response()->json(
                [
                    "codigo" => Response::HTTP_FOUND,
                    "descricao" => "Carteira listada com sucesso.",
                    "wallet" => $entidade,
                ],
                Response::HTTP_FOUND
            );
        } catch (\Exception $exception) {
            /** @var int $statusCode */
            $statusCode = $exception instanceof HttpException
                ? $exception->getStatusCode() : Response::HTTP_BAD_REQUEST;

            return response()->json([
                'codigo' => $statusCode,
                'descricao' => 'Não foi possível obter a carteira solicitada.']);
        }
    }
}
