<?php

namespace Controllers;

//use Ville;

class MeteoController extends Controller
{
    public function getListeStation()
    {

        
        $ch = curl_init();
        
        $token="eyJ4NXQiOiJOelU0WTJJME9XRXhZVGt6WkdJM1kySTFaakZqWVRJeE4yUTNNalEyTkRRM09HRmtZalkzTURkbE9UZ3paakUxTURRNFltSTVPR1kyTURjMVkyWTBNdyIsImtpZCI6Ik56VTRZMkkwT1dFeFlUa3paR0kzWTJJMVpqRmpZVEl4TjJRM01qUTJORFEzT0dGa1lqWTNNRGRsT1RnelpqRTFNRFE0WW1JNU9HWTJNRGMxWTJZME13X1JTMjU2IiwidHlwIjoiYXQrand0IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI4ODYwZDdmZS0zNmJmLTRhNzUtOGE2Zi0wN2Y3ZjMwZmM2YzkiLCJhdXQiOiJBUFBMSUNBVElPTiIsImF1ZCI6Ild1MkxrNmdzZU1Mb1ZUZ2habGpNdkJ5U3VaQWEiLCJuYmYiOjE3NDMxNTQ4MDgsImF6cCI6Ild1MkxrNmdzZU1Mb1ZUZ2habGpNdkJ5U3VaQWEiLCJzY29wZSI6ImRlZmF1bHQiLCJpc3MiOiJodHRwczpcL1wvcG9ydGFpbC1hcGkubWV0ZW9mcmFuY2UuZnJcL29hdXRoMlwvdG9rZW4iLCJleHAiOjE3NDMxNTg0MDgsImlhdCI6MTc0MzE1NDgwOCwianRpIjoiOTlkODdkNDMtNGRmNi00Zjg4LWE2YTEtODE0NzBiOGE3YjI3IiwiY2xpZW50X2lkIjoiV3UyTGs2Z3NlTUxvVlRnaFpsak12QnlTdVpBYSJ9.IC_8dZ7ZWH59YfD99PiWiR4SdVxn53km4LOSI3pH7Ql1rqOzwELQjPmW2DBnEgiA7p8Vz4xZJlc2o4BPi4jzNJtqFqU46tehzAcX4spxifIPWDvawW8ODm4z9x1HXLCb0zXQsCgstF4DwF_bYTNDx8p9m99r65es2txBz3TsGHOEILQhOz6lk4UyN4bZ_wyuNckjVknz2hOxrB5pKECF2xK3y5d5NE7i9jZBiEczOqElqgCm3NAUnfKHus3ZFeZcVLxcRkYGsx2Jb-yqH_L0dG014JE2ckI-2AarpqqIV8g7ihJGcVEW-PBL7mpmIsgdIP5ndPLJvHaUHVJ_4XJjmQ";

        curl_setopt($ch,CURLOPT_URL, "https://public-api.meteofrance.fr/public/DPClim/v1/liste-stations/infrahoraire-6m?id-departement=80&parametre=temperature");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
            ));
        $response = curl_exec($ch);
        $villes = json_decode($response);
        //dump($response);die;
        echo $this->twig->render('meteo/liste.twig', ['villes'=>$villes]);
        
        
    }

    public function getDataQuotidien()
    {
        $ch = curl_init();
        
        $token="eyJ4NXQiOiJOelU0WTJJME9XRXhZVGt6WkdJM1kySTFaakZqWVRJeE4yUTNNalEyTkRRM09HRmtZalkzTURkbE9UZ3paakUxTURRNFltSTVPR1kyTURjMVkyWTBNdyIsImtpZCI6Ik56VTRZMkkwT1dFeFlUa3paR0kzWTJJMVpqRmpZVEl4TjJRM01qUTJORFEzT0dGa1lqWTNNRGRsT1RnelpqRTFNRFE0WW1JNU9HWTJNRGMxWTJZME13X1JTMjU2IiwidHlwIjoiYXQrand0IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI4ODYwZDdmZS0zNmJmLTRhNzUtOGE2Zi0wN2Y3ZjMwZmM2YzkiLCJhdXQiOiJBUFBMSUNBVElPTiIsImF1ZCI6Ild1MkxrNmdzZU1Mb1ZUZ2habGpNdkJ5U3VaQWEiLCJuYmYiOjE3NDMxNTgwNDAsImF6cCI6Ild1MkxrNmdzZU1Mb1ZUZ2habGpNdkJ5U3VaQWEiLCJzY29wZSI6ImRlZmF1bHQiLCJpc3MiOiJodHRwczpcL1wvcG9ydGFpbC1hcGkubWV0ZW9mcmFuY2UuZnJcL29hdXRoMlwvdG9rZW4iLCJleHAiOjE3NDMxNjE2NDAsImlhdCI6MTc0MzE1ODA0MCwianRpIjoiNjliNjE3NDItNmMxYS00ZDFlLTg2YjUtNmM5NzU1MzYzMjdkIiwiY2xpZW50X2lkIjoiV3UyTGs2Z3NlTUxvVlRnaFpsak12QnlTdVpBYSJ9.MSU8N9_Ieij2QD8O4XoO_t7RbbIdLB0u-qiN9o2XtCS4KfnLiepmbEBTQNn096LvMaXNrAwWWsOMZfbq4jOaWJqKqdxpB29jmsXDLIX-dtCgr2s496SbFiC2Et1Oq69LZgYTqx-j5f_LABynLDHCU11leNHyyDcnMReUnJzS5kFC1xc1YveNR2oPTVZfUhVd8-QsIDmi3oqpjmhAMMhmWu-QEB20fgfhneCWn_fYbhForQlt_7st2PM0TVWoM8hVsB_Oshil3-Yg5kei1TO0_PjvSI1l5K86Xod0SK2KbL4r4vl9gEzd1fLIqh18vy7dsFxv1DrAOesCijRf_sIrNA";
        curl_setopt($ch,CURLOPT_URL, "https://public-api.meteofrance.fr/public/DPClim/v1/commande-station/quotidienne?id-station=80001001&date-deb-periode=2024-12-31T00%3A00%3A00Z&date-fin-periode=2025-01-01T00%3A00%3A00Z");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
            ));
        $response = curl_exec($ch);
        $commandId = json_decode($response)->elaboreProduitAvecDemandeResponse->return;
        //dump($commandId);die;

        //Récupération du fichier
        
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "https://public-api.meteofrance.fr/public/DPClim/v1/commande/fichier?id-cmde=".$commandId);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/plain; charset=utf-8 ',
            'Authorization: Bearer '.$token
            ));
        $dataQuot = curl_exec($ch);
        $rows = str_getcsv($dataQuot,";");
        //dump($rows);die;
        
        echo $this->twig->render('meteo/datas.twig', ['rows'=>$rows]);
    }

}