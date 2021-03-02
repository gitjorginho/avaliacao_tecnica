<?php

namespace App\Http\Controllers;

use App\Artigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    function capturarCarros (){
       return view('capturar_carros');
    }

    function capturar(Request $request){


      //Captura a pagina
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://www.questmultimarcas.com.br/estoque?termo={$request->text_capturar}");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($ch);
      curl_close($ch);

      //Diminue o escopo de texto
      $primeiraPosicao =  strpos($output,'<article');
      $ultimaPosicao = strpos($output,'<!-- end main-content -->');


       //Criar um array de carros
       $arrCarros = explode('</article>',substr($output,$primeiraPosicao,$ultimaPosicao));
       array_pop($arrCarros);
       foreach ($arrCarros as $carro){

          //Retira do texto o nome do carro
          preg_match_all('/(?:card__title ui-title-inner"><a href=")(?:[\w\sá-ú.:\/\/-]+)(?:">)([\w\sá-ú.:\/\/-]+)/', $carro, $caracteristicaCarro,PREG_OFFSET_CAPTURE );
          $nome_veiculo = $caracteristicaCarro[1][0][0];

           //Retira do texto o link
          preg_match_all('/(?:card__title ui-title-inner"><a href=")([\w\sá-ú.:\/\/-]+)(?:")/', $carro, $caracteristicaCarro,PREG_OFFSET_CAPTURE );
          $link = $caracteristicaCarro[1][0][0];

          //Retira as caracteristica do carro
          preg_match_all('/(?:card-list__info">)([\w\sà-ú.]+)(?:<)/', $carro, $caracteristicaCarro,PREG_OFFSET_CAPTURE );
          $ano = trim($caracteristicaCarro[1][0][0]);
          $quilometragem = trim($caracteristicaCarro[1][1][0]);
          $combustivel = trim($caracteristicaCarro[1][2][0]);
          $cambio = trim($caracteristicaCarro[1][3][0]);
          $portas = trim($caracteristicaCarro[1][4][0]);
          $cor = trim($caracteristicaCarro[1][5][0]);


          //SAlva no banco os carros capturados
          $artigo = new Artigo();
          $artigo->id_usuario = Auth::id();
          $artigo->nome_veiculo = $nome_veiculo;
          $artigo->link = $link;
          $artigo->ano = $ano;
          $artigo->portas = $portas;
          $artigo->quilometragem = $quilometragem;
          $artigo->cambio = $cambio;
          $artigo->cor = $cor;
          $artigo->combustivel = $combustivel;
          $artigo->save();

       }

       return response('Carros capturados e salvos.');


  }

  function tableList(){

     $artigos = Artigo::get();
     return view('table_list',compact('artigos'));
  }


 function delete(Request $request){
      $artigo = Artigo::find($request->id_artigo);
      $artigo->delete();
      return $this->tableList();
  }

}
