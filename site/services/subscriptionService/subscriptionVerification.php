<?php 
////////////////////COMPILATION\\\\\\\\\\\\\\\\\\
// require subscriptionHandler
require_once __DIR__.'***********/dbConnect.php'; 
// require config.php    
require_once __DIR__.'***********/config.php'; 

  if(!empty($_GET['email_verify'])){ 
      $verify_code = $_GET['email_verify']; 
      $not_verified = 0;
      $verified = 1;
      $verificationOutcome;
      $verifyOutcomeURL =  'https://medmatters.infinityfreeapp.com/subscriptionVerification.php#status/';
  //////////////////RUNTIME EXECUTION\\\\\\\\\\\\\
  //check DB for existing verification code stored:
      $qrySttmnt1 = $dbObject->prepare('SELECT * FROM *********** WHERE *********** = ?');
          $qrySttmnt1->execute($verify_code);
            if ($qrySttmnt1->fetch(PDO::FETCH_ASSOC)){
              //if existing verification code is found,check verification status.
              $qrySttmnt2 = $dbObject->prepare('SELECT * FROM *********** WHERE *********** = ?');
              $qrySttmnt2->execute($not_verified);
                if ($qrySttmnt2->fetch (PDO::FETCH_ASSOC)){
                  //if verification status not set, insert verification status and record modification timestamp and exit with success msg:
                    $qrySttmnt = $dbObject->prepare('INSERT INTO ***********(***********, ***********) VALUES (?,?)');
                    $qrySttmnt->execute($verified, $datetime);
                      $verificationOutcome = 'Thank you for subscribing.';
                      header(filter_var($verifyOutcomeURL, FILTER_VALIDATE_URL));
                      exit();
                  }
                  //if verification status already set, exit with no further action
                  else {
                      $verificationOutcome = 'You are already subscribed.';
                      header(filter_var($verifyOutcomeURL, FILTER_VALIDATE_URL));
                      exit();
                  }
              }
              else {
                  //verification unsuccessful due to no code match
                  $verificationOutcome = 'Sorry there was a problem with the subscription verification. Try again later.';
                  header(filter_var($verifyOutcomeURL, FILTER_VALIDATE_URL));
                      exit();
                  }
  }    
  //verification unsuccessful due to missing veri_code in GET url
  else {
      $verificationOutcome = 'Sorry there was a problem with the subscription verification. Try again later.';
      header(filter_var($verifyOutcomeURL, FILTER_VALIDATE_URL));
      exit();
  }  
?> 
 
 <!DOCTYPE html> 
<html>
<!--Metadata--> 
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Mediterranean Region News and Analysis">
        <meta application name="Mediterranean Matters News Site">
        <meta pagename="Mediterranean Matters News Site" content="Website for news, opinion and information about the Mediterranean region.">
        <meta name="keywords" content="Mediterranean, News Opinion, Mediterranean Region, Italy, Spain, France, Balkans, Greece, Turkey, Malta, Morocco, Algeria, Libya, Tunisia, Egypt, Israel, Palestine, Palestinian Territories, Syria, Lebanon, Jordan, Bulgaria, Croatia, Portugal, Cyprus, Montenegro, Macedonia, politics, economics, geopolitics, strategy">
        <meta name="subject" content="News">
        <meta name="summary" content="This is news website for the Mediterranean Region.">
        <meta name="owner" content="MedMatters">
        <meta name="topic" content="Mediterranean">
        <meta name="revised" content="Tuesday, October 14th, 2022, 18:21 pm">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Header Title and News icon created by Freepik - Flaticon-->
        <title> Mediterranean Matters-Mediterranean Region News and Analysis</title>
        <a href="https://www.flaticon.com/free-icons/news" title="news icons"> <link rel="icon" type="image/x-icon" href="https://lh3.googleusercontent.com/fife/AAbDypCOzFd7tJY1492HDngvZWAm3YGSyjN5_1ciibrO8SoQ7SQLsGUZTur0rDX-7TRUD5OqJRyBxZWLzukiYXmiKRcfqcKM4cjnyYerpsT_rNynCRf0OAZPR7RsmK_RCEhkPT1VhlIqdwJGvhEUJ25PVxFkhUWs6cNV0hMpyBcSXS_XbFS4oowqwQKD7IkK7EEVkChTBUfCADaHcaNBUbwpaIi5FqC8IXbLRV8003d29tsrJbUX1Mu_ww-Fl8O9RAUtyQ2Wc7WthC5rHOnP0Dhc6W7R9nHP_M1raEYKWzil4P4A2qUajeWkQGguQzgsL2Zw0LLqbG7phJRBlc0A9P-7I2JmBs35maaVdO_18ZfnOHuxZPnLdV4bApGPxkasqarjOmIUTijpoc50-wCmoXCeLlkn_h19UUjseKzC0Vu5xVFwd6E-XDJmfqOWm02zleBi_Ly5-xkVcyNznRJzm-AGShSrU1r_j7jZK5F04EjNj0U8ErjnQKIVicyKFg_4Ir_QHmhD32fJJ6K6MUUk3Cv2tAZcS-WQsoOyUbK0pR7gjInu_jjmE0wgs3Dc1hCrPfAKV97hJzcYPYOjgHwGBif_KfJufvk3iIqngRsM60HBPLFeUbvcGNRemVOFd8OFodOPElxw7K-595guiO7WiiKxy2zJWlncKoX6ljhcv_s2pbje36l7J5Zru0Kk5U4tohE9WlcZ7nMzGNYJ5Y-QjIi7z_feX4Ac_JgGrWrj0LorqjtmTQolFTmEBDH5qI7LpQyhj3GDdItvcvhe_F9xlqQJM1DmxAezrlqs4jFzA7zOhRwIOAaNlyepdZGq6BHz9KJeQSg3uAYofQmecJrvXIS_7Rh0JvrW41xro5__G2DrlAVRvKy2_6frAyaa1IwSd3MJcHsiGJeGsOdpqT6sjxA05EgHJf8eEdlKWfKbxNdqqRBP4Q-cIZuoDN35S6AbeUeHPbqHt42hyuNEz-ftd1T8YMqB-mZEo-JKpLIm0JQKVZQzl4HMIUgu2Kc4QOFtQ9zPGxVpviSMW4VP1a9wPcDwk7bk8KqFmOhRvqvKLcaaQhLO0SlT_KRRM8glEt7DPU2dL4tJfHabLERX2uqp7BgfjpTOMnezLhTRTxlik_y19PnB5R60zHbwc293BIRM6bBhhHn2eUIVx_b6ozIFvE4rdLSMlxOVl88uKXTyScU5PZJvsJycJ3D_H9jVN4La2DZzTREc2hIqAXASdhkQr6UOumsTg8V7dsKZZYBdDkZtRMNH9a7GJK1E-jBES5b26Sc_4wbePALetV7WYIdv0HaTehA4WqQdsMgrD49_SG9iYCoxM_Dk2N4jrApP3bFDOB5YWtrpzLbeOH2tj_BAyr8Bzzq_HAw-GbBdgb3cQ_1NAtZo24m7kr09VFUZxc7ir-e6XOxgX2arrwq6_Wn-zBtVx_uF90sYNp0V3wK7pvqDL1l6u2r-_2yjeoJ5idfsGT9lq9iAnG3jR3uxwtU0Xm3glA=w1367-h405"></a>
<!--CSS Style Link--> 
    <link rel="index stylesheet" href="styles/mainStyles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Julius Sans One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    </head>
<!--Content Page--> 
<!--Main Navigation Menu-->   
      <nav style="text-align:center;" class="main-nav-style"> 
        <ul>
        <img onclick="showTrans()" class="translate-btn" src="https://lh3.googleusercontent.com/fife/AAbDypCX0VXLinRWC0vGo7mT_eBKKMu3Lypm9JO0v7mv9vJoJCQc_GwD5xZwGIJ_nxnv2d19MxSN3ZPQU4ewIzCJ2d823GNEJlx1t-kRPk6kNlH2lfrTS_it9o5pDWbhpikisNLCbh8PK61gF7inDY1pyLRW4zbHVzWliJ8MxkAxNAiCJz6VK_e0uPckeLlyLCk1lGD0uYC8HhIt9pVfA0DWSVBcbOYE1kc5QOljuyqq-MjjxiyhTnE4LFsli2lGipXePvSZFAO8BJAfCSvLn0leCMXxGI1-1YFZ2SeUPhI24xAfY4q0yuPk6lZtOfRytC7wBkC41H4hS2TtEEWF_lmBL3y-ZyMuW8UDWQJFvKOngFh9Ckmdx7OsDFyoV2x4Bwcayx2-VZY6upblnG206kjJUlc9V8d_pdl8ZOrGU2BN_lhFr6MZXRr0dgTQP2PgMDCG8s6ZYADJXvcFhyHZucpjV5-nQcTf2rwFl-l-iuusgxaaCfKwBVKa9fqdOtO9nCjsQU6__oZ9WvAph_hGy00cgSV9axgCMytAtLf5tahIP_U7LVVA34mJ6_uuHJVaWvGU9wwD27w567hQpwotjM3Ra1n-6ScytwadFJAhA2duktboq4C4CEBd7o6Di9Ek5YypN_0MohIyyD-MeeW6gFNoLAF2_GPXes2DGvZzr0NdGfE3PqR3lvdKE-RmbLd3hY1ksdg_RpWyESrcamwMBcmuaqsv0mgqSspdsVrWvIt6RGQzLIGgXCpzOngK8cDW4NL-I7nUS3vKwVoHG2wQwQLiiyjoxw07ONvL0NKCuiSw5LWBhcVFJNx428Uf5juyuDe1SM6UR-2e_tpCZ2nBY3ta3CwmaF9uPMazqVpUS0GrygmHRoPUIXXPiVK7TuQJrKsDtL-qO6Q3BjWqDMjmcsJEpy80QupjRfZkpyEyh0SNoxDseO8BuFqObPY1wceZlq2rR4cXd-8CbxxxK3LskfzaVXITM6AjYu-ys5MYKppRfPPHXsZfVKU1Zm1FYlN34tGxMs2z-9Tv3wgZFa1Kp9FcJxNNvhZMXHymuK34vM5vzNHy-Zr2Y5vzC-b_wJohqnXPh-tEIsXHmvGE_NhmOWwuZ7-SMzK5-loe42YpRpQcqR5XhOb6D4KU59BcSkfgRfGXHsg5LtF53EqOSHmGlHxnX0IKEXA62lHhAcAL7FRTtoJ19i1cLUKXB4mD3BloMniuw6ha76UBJVdRBeLVkhtf0d7XXpdx6BM12SXDgUTp47Ldl1VgC6WfCli15QW9ZyyG1Hg70NY27cLf6tA1Xww8wwARCi4krNCS246n6xmlP9OeXDCH3U3QS9P-oZSlJHmn9-M2AqiBKjP6COLfQ7oTgNMk_odIPD5G2TySS1RjX69ghCP-HaTiKmXffI_cHd3zhh0yeyUzsKmGWJna3l_rK-skPPIZ5vUVABcWAZgImD6pz2R4idxAK0N2d7l0qKkWG9-vizfUKEPcnBmOvzkNQA=w1367-h591">
          <!-- Icon created by Pixel Perfect, downloaded from flaticon.com : <a href="https://www.flaticon.com/free-icons/translate" title="translate icons">Translate icons created by Pixel perfect - Flaticon</a>-->
          <li>
            <a href="About.html" style="font-size: larger; color:rgb(186, 236, 208)"><b>About Our Newsletter</b>
            </a>
          </li> 
          <li>
            <a href="Latest.html" style="font-size: larger; color:rgb(186, 236, 208)"><b>Latest Regional News</b>
            </a>
          </li>
          <li>
            <a href="Opinion.html" style="font-size: larger; color:rgb(186, 236, 208)"><b>Opinion</b>
            </a>
          </li>                      
          <li>
            <a href="Country-By-Country.html" style="font-size: larger; color:rgb(186, 236, 208)"><b>Country Profiles</b>
            </a>
          </li>
          <li>
            <a href="Podcast.html" style="font-size: larger; color:rgb(186, 236, 208)"><b>Podcast</b>
            </a>
          </li>
          <li>
            <form action="subscriptionForm.html"><button type=submit value="Subscribe" style="animation: reverse;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;">Subscribe to Newsletter
            </button></form>
          </li>
          <div class="g-translate" id="google_translate_element"></div>          
        </ul>
      </nav>
<!--Header-->  
    <header class="main-header-container" id="one">
      <h1 class="main-header">
        <b>MEDITERRANEAN MATTERS NEWSLETTER</b>
      </h1>
    <br> 
    </header>
<!--Main Page-->  
  <body>
    <main> 
      <div class="separator">
        <h3 id="status" class="main-intro-header" style="color: rgb(10, 59, 41); margin: 1em; text-align: center;font-size: larger;">Your Subscription Status:
        </h3>
      </div>
<!--Subscribe Verify Result--> 
      <section class="verify-status-container">
        <div class="status">
            <?php echo $verificationOutcome ?>
        </div>
      </section>
    </main>
    </body>    
      <footer class="footer-container">
        <h2 class="footer-header">Connect With Us For More Content<br><br></h2>
          <span class="footer-logos">  
            <a href="https://www.twitter.com"><img height="65px" width="100px" src="https://lh3.googleusercontent.com/fife/AAbDypCOBTi422iUpHwWSh6pabvxq3pP1AfHslOko8tqNBlLcE7B7x0HkG3GW8mVLzhDuT4dwNu-SLR_8g9QFrYaRF2hsBmNuxNM38FfpCtRwxoDT608ozZBJTIzR_VztaxkVCQ86KmPrMjSNIFJKSV1z49BDrBa1kgZi2KtP-3S_tQZuU7Y_mIx1rbr-GdNg0ZuOvyEbqM8crmbYdGx4xOv4gg86eYEsYE8Scu9dl4k069pr-Dvc0Dsmutrieg5MRDpFqVjq5QPw56ZEfkaoT7ZVxNrCvbqabwYzA9Hap4MtJMBI4m0Vkg7N_rFMey3DYa0HrhiOtTvzmEczYCdAbcx45Y0S2pYKIU9RWu22EIO-oQP5qB38ovqjReakSn6J8Ppzb6zD69F1NyRZdnpPAM8WsY-Z2MMBYca2aA2bAsWlJMFqr4otG-0BMXrjyAJowSwICS6Nz1EmLJpgkJolMoZFPfq3Ve2Yzf_SOrVYA1I2ba7JZ69yxFaI9sXJJDYoldHEELkPWo5Re-VniLzglE3F09Tm2L8p3_DPJYJFQ4eSvs1E5P2PmE636eVzJpbff5G0CXTGWMy_EXpEDFzIk6C6aESLIKU-Hb166phrOwppL7qV7UO9sPYTjGcooIqshF-Mt7mL3ww98N0Nknr-OxHGa4JhZU_bBCE9PRWKGgZIrcsyqTUSQNf_roWAVjgQ29dPMelK884ATdDwcs469A-5o5vj0Id6EeL9E8D3TXJJzU1xkVWiryk6AJGCRJmMpKIXbn0s2CBGldyNEprBogDpnHtUW3kRo6eZQtsm5scMo1w8wvVNUewVkET8Pcs0vmPQ1ef7oUxtVt7g7XWufCS4g9YhKOBGRMnILc5qburCyKsvaC0H7vh8G-jNQo9my4Dx768UGIcSxJ40-Lryj9iV590t_KvBLcwvPfeay5QzHk0398tSAmPpZcuyzVfXa6Weuu_iblRCHcN8zErHgedBMtJSG1PDiqWvGLkIehOS1OFsLdpaK1JJfvevFo5B61HfUIRGL5PKxHdpCLOhv7H8lt4rB3mWGL0F1Utg32UwL5MyuKHzxxBEBsiJvOmOnrABblajJyy8jSBllC_0INQEjGh3HsrFoLtsnyVFa90XLBFNgdj_qTj9iCfxDTrFLcuh9E2a-TclWknyURRxR_CeZ1Hl6MVg-DkYdZwaq3KFChUUsjUMVet09Lr0a5W0rQ3tl0AF5mjd7ECl0Mhk_3m76fxBE4AJ846Jz8w1jmYSISUwi_TAWOp_jYzTTcBX6yTlShfiB52cOEqZYFGVWu_T_U9A1nfjCRS0LkfuvlkVGI6zDOGF6-DN8QOcK01eUZifgaVKvU2V8p8nCXbEIPmw5qsFF1MTq2Tphor_MKGLYAzqSSpIo_X3NBMlZO-KdV2FVqTsLw8xlwfflGcagdVwm61VI-WXo5EhlYp2TYYOGaUd15sMrEN-b9_INqumqVFfVL-D26lX--qNm2XTgnU6w=w1367-h405" alt="Our Twitter Page"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="https://www.facebook.com"><img height="75px" width="80px" src="https://lh3.googleusercontent.com/fife/AAbDypDvtqTG_FNFwm9lehC310EGszx0CauK1LHwaAvPT07LyFpIutLgkiZBPHMzIlA_gGtRJ6msCl1UX7RSGlLWcOtLEo2U9bk4T-ibNr5B_ncRV2gx0akYkr9ZZ4ShA1qVJ0_adt9lAJTpV5C_YOvnvmpVXHQlkar6-kgDbMXX5IgzqFGHXyOfMZ29I3eiep_AKBFYbpYWDMpzgED1akLzt4emonst_b8nmqNPmPJ-yE51C3ArJpb3klMx_nb9Ol5P8sMfb9ST2eopzdBGKCSJPJD4cfPw_vjkli6wqpkCWjO4DSXXPJx50X_cRcTufQUAOi3_oCnuqOkId53B1p6Pqz2gZEuXuQW9UWStJtb_WIAkn-OKMVy7nhIZW77_cFywglHuqp8VzDgs7wS-8P6c5ACbsrw_GeNNq3K012GObvwsxJnWsQrbG9JlEo5Kh735IRhetW_Ao1YE0OW2TYT4SkhRIizQQkOFZhQznYonI7r6sjdBh-Hs8zvK6YJ1pYkBAihQdYFheOwJfV93MlBI0OqOLprJzfYWniF498JJ01FEBUn8iJiHrytLVpa7QnxXmzqHDKg2eR3PrWv9qlHglH9Idy7hURtSQY0-OAy5cMPDq0DxpMP08zUVvp7jBLkODd374qVuJmP0EKFKbeWOw_MdZHy60L_cv8dgg4XjRyXLzf4PBU5VdMw_4s7905mVHMyyvqthZ2RK1Gfx5g3k0soPL5hxjjDuTVH2pO0nPAuknkua4VboXeGBPV8mC3MvWDO1J1Zy8hqPaQNClu3KROVfqvhmF-OQwiFvpgo3RC9XfUw6mFA6v8fl42J-y6slHs4x9tDwJ64dBNZ2C2oaT_bvnNmNrvH0H5rA5U06EiIlc8wzXfQt3JHiSaZazPUpt11zZStjDiZcyZMNaUdmIoxTxkd06HDMtsl5z1wdnRC6USXmUzgJHrXFhdXxnBs3Mnl672DJel995QXYWs_BYEW__ZAjD7qQ5QRvga5dDvvmGJmjGqaXE4yKS8bG_IEFTOCP3G1eNgSacJXipXeCMHm4QE39aQgOy4Efk8StUj0h3c0Rt2CjGsDSXm2BhPi3TE-YjZhvAtLBRVn5UsDFdgqbPo25DPOFjasjfRsWfAFbKnxoEI1YLpbkNVgtBD8yDMiDcE1tcq6xvXVz_zUFBpbyJw4iQDfB7zRbYzf6IJnKIotBPYg39SE30Zq0aZjaH-gdU-doLWT03mDIYX9c2qJV0wgFa9pM06kxop91dV5nHKaZ1mWsKDomixiIosHTA47yO3f8qgwB7UTlrXj965WEOK1tkv--9-8CAgp6t3j9GtuNgGJMz77x2JTjq8WpVY4idXNEAMyyq_oAKzwqU6kFFdn9TmZx4Fy8eJ6PpthiHuf_8WaAdHNeHzdjGi-GE6luDw5_x02PgXOYH_8iG8zJnYFW_y9TYGCiynhphgHnKhUmEAE9FRRqs4PaDfbtPfSsEBXCttoR9j7xyvFP2Q=w1367-h405" alt="Our Facebook Page"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="https://www.instagram.com"><img height="78px" width="85px" src="https://lh3.googleusercontent.com/fife/AAbDypBDKSz4FiKkAr0MkCfRSOjI0EJz3kyRsetvjcpmhfO8wtyK-lLAQMLYz6i0AGU9sHIDWttjzo7-tAvbKQu5I_wb59IuXWoZ8LzlMTgXQybvnCkMqXrC80m5WX7-OiCa4rSCK--6LvUDSrVi5BtImFJMmyoYW5uxhwr-K8GjFHTCK_quBUzBRR1cGEqbICO3nTFU6xjVzjwFlU_lP8jfxFQzhbf0aojUQhm0XwLrzP7L-IQPv17mfofuvxj_y28rsLJaR0iW87ibiWlkgsmV9rYBPALyd3LYaf1d_uoeUKnKJXRicsaf8dICWGIdL4VsXHj7xFbFxcMWljmTiuQf_I3zYO7XklppT3WSUAf2rvcEnX1URKNcpYsANoY3_diklcNadL0f3pWArFkPOyHTgbb0NKFNG7zePZrEXN5AFE3D1kZy9Nh5VX8EkqHd2s1YAloGdCFwwvNJbq6G-pn8v-3V2_oHNtqYN4UQhHf9IjkT_kmVzswWlfXy5rKGY1dbfdY79Fg7ac7bVTBWc4hTbqTXwYtE7zpMI0_mzdyshLNtt6vQuR4BH9Vauop-iQfKWQTq1x76wR7Q0cbcrW2UY4czWTH6LTmcCBtw7RQMWGcmeRkWBK_ZH-d-HJ_pMPxKCkrLp3f9Td8nKvujmMF70sBpHQQj2G7a4odpOq-RtInlXBgzjiuobawOw9LChMBLohdgzg2mYjELgNafi8a5DWqhcdjE22MFSweIC5mBji06tRIl1Io9ne7uK0UQD__vDEa5v2eDb0S1NMK1iIG531XWaGctyCuIPrZZYosX8Nk4he2RuPWpSMq3nlyZyvkz6HMbj4z21iDtAocmfbApKY0K1JCPCfDdKoZ7tLvIkykWCLKpQ-t1-QA3Hb9S0dBJSNo_ULAmbFH3OKRLII9cE3v4_bi_9K_2_5r0lUnM2klbqTPcWtOCac3nw37A5n42oODwVW3vlGPGqn5Zp4XyJCrR5Z6bfL7wtjCJAKhvwmw7h70jONspDanXZLNylGiQFKORhfAHIxT1dmRhBJlREe1qQBec0sTpR-ybBVe5LybOB8MfBwHHVik1VwZ5dsX_JSKfdKXRba0qK_gDhUG60lbqqzCRghZInYsBQLT2QW2js6vBwjZ-xG6Naf0_LmvBztaQqaiWEjhlBBn8QUuX9uv3TswAmGbdyZD9jgqGWJAujMhYfIdQ6WDSO6KDhhShWMGt-aFr_OPA19sfYY4Z23lxqlk38-0a1gRtr6Ujwi5JnDouzu7_rNJy2g-3sOk9TP4B8OYqrA2ZjZru4aQeZdJjKI9PkFireem8P9of8BJpW6OnPit-JAfi47dKuFlkB_dDtC1EEz7BJG7ev_R3krZic_ts4SzELX_qTNVBefVtFJ82LIov1sx7wBxtFRN_uEikZosGMAhs-F8qStya2HvgvnB3pnQ7JOL0aaGcF7TIYKatk5ylnPx0HWUzEI2KJL8n7l05oAUCPB5C-aAr1w=w1367-h405" alt="Our Instagram Page"></a>
          </span>
      </footer>
    </html>
