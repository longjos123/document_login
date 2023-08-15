<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tatum\Sdk;

class NFTController extends Controller
{
    public function mintNFT(Request $request)
    {
        $tatum = new Sdk();
        // TestNet API Call
        $sdk = $tatum->testnet()->api()->nFTERC721OrCompatible();

        // Thay thế 'ethereum-testnet' bằng 'ethereum' để sử dụng mạng chính.
        $network = 'polygon-testnet';

        // Địa chỉ contract
        $contractAddress = '0x8ECEdE18207572b33CBa704775496bcf388D6d49';

        // Địa chỉ ví Ethereum để nhận NFT
        $toAddress = '0x1e72cC499e0480D1A58DE7aF207bb66b0252D4ba';

        // Đường dẫn đến metadata hình ảnh cho NFT
        $imagePath = 'https://bafybeidiufja3lyta53zkzyk3q2wq3yamqwy4avwlurncxi6qvuoat6x7i.ipfs.w3s.link/10.json';

        $argMintNFT = (new \Tatum\Model\MintNft())->setChain('ETH')
            ->setTo($toAddress)
            ->setContractAddress($contractAddress)
            ->setTokenId('9')
            ->setUrl($imagePath)
            ->setFromPrivateKey('0xf122a6c5fed41bc01e8e4315eef54b39e739ba341b7c71a4c07816f5599c7b46');

        try {
            // Tạo NFT
            $response = $sdk->mintNft($argMintNFT, $network);

            dd($response);
        } catch (\Tatum\Sdk\ApiException $apiExc) {
            dd($apiExc);
            echo sprintf(
                "API Exception when calling api()->nFTERC721OrCompatible()->mintNft(): %s\n",
                var_export($apiExc->getResponseObject(), true)
            );
        } catch (\Exception $exc) {
            echo sprintf(
                "Exception when calling api()->nFTERC721OrCompatible()->mintNft(): %s\n",
                $exc->getMessage()
            );
        }

        return response()->json(['nft' => $response]);
    }
}
