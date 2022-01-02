<?php
    require_once "../js/cargarNumeros.php";
?>
<div class="row">
    <div class="col espacio-1">&nbsp</div>
</div>
<div class="card">
    <form name="frmlistar" id="frmlistar" enctype="multipart/form-data" accept-charset="utf-8" method="post"action="">
        <h5 class="card-header">
            <button type="button" name="nuevo" id="nuevo" class="btn btn-info btn-sm" onclick="javascript:nuevoOdontograma();">Nuevo</button>
            <button type="button" name="guardar" id="guardar" class="btn btn-info btn-sm" onclick="javascript:guardarOdontograma();">Guardar</button>
        </h5>
        <div id="container">
            <div class="row">
                <div class="card-body">
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">N° Identificacion</span>
                            </div>
                            <input type="text" name="paciente_id" id="paciente_id" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">&nbsp</div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
                    <table class="table table-bordered">
                    <tbody>
                        <?php foreach($resultado as $imagenDiente):?>
                            <tr>
                                <td width="48" height="15" align="center"><b>11</td>
                                <td width="48" height="15" align="center"><b>12</td>
                                <td width="48" height="15" align="center"><b>13</td>
                                <td width="48" height="15" align="center"><b>14</td>
                                <td width="48" height="15" align="center"><b>15</td>
                                <td width="48" height="15" align="center"><b>16</td>
                                <td width="48" height="15" align="center"><b>17</td>
                                <td width="48" height="15" align="center"><b>18</td>
                            </tr>
                            <tr>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img11"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img11"]);?> alt="img11"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img12"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img12"]);?> alt="img12"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img13"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img13"]);?> alt="img13"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img14"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img14"]);?> alt="img14"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img15"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img15"]);?> alt="img15"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img16"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img16"]);?> alt="img16"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img17"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img17"]);?> alt="img17"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img18"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img18"]);?> alt="img18"></td>
                            </tr>
                            <tr>
                                <td width="48" height="15" align="center"><b>21</td>
                                <td width="48" height="15" align="center"><b>22</td>
                                <td width="48" height="15" align="center"><b>23</td>
                                <td width="48" height="15" align="center"><b>24</td>
                                <td width="48" height="15" align="center"><b>25</td>
                                <td width="48" height="15" align="center"><b>26</td>
                                <td width="48" height="15" align="center"><b>27</td>
                                <td width="48" height="15" align="center"><b>28</td>
                            </tr>
                            <tr>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img21"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img21"]);?> alt="img21"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img22"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img22"]);?> alt="img22"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img23"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img23"]);?> alt="img23"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img24"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img24"]);?> alt="img24"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img25"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img25"]);?> alt="img25"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img26"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img26"]);?> alt="img26"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img27"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img27"]);?> alt="img27"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img28"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img28"]);?> alt="img28"></td>
                            </tr>
                            <tr>
                                <td width="48" height="15" align="center"><b>31</td>
                                <td width="48" height="15" align="center"><b>32</td>
                                <td width="48" height="15" align="center"><b>33</td>
                                <td width="48" height="15" align="center"><b>34</td>
                                <td width="48" height="15" align="center"><b>35</td>
                                <td width="48" height="15" align="center"><b>36</td>
                                <td width="48" height="15" align="center"><b>37</td>
                                <td width="48" height="15" align="center"><b>38</td>
                            </tr>
                            <tr>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img31"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img31"]);?> alt="img31"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img32"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img32"]);?> alt="img32"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img33"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img33"]);?> alt="img33"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img34"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img34"]);?> alt="img34"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img35"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img35"]);?> alt="img35"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img36"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img36"]);?> alt="img36"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img37"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img37"]);?> alt="img37"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img38"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img38"]);?> alt="img38"></td>
                            </tr>
                            <tr>
                                <td width="48" height="15" align="center"><b>41</td>
                                <td width="48" height="15" align="center"><b>42</td>
                                <td width="48" height="15" align="center"><b>43</td>
                                <td width="48" height="15" align="center"><b>44</td>
                                <td width="48" height="15" align="center"><b>45</td>
                                <td width="48" height="15" align="center"><b>46</td>
                                <td width="48" height="15" align="center"><b>47</td>
                                <td width="48" height="15" align="center"><b>48</td>
                            </tr>
                            <tr>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img41"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img41"]);?> alt="img41"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img42"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img42"]);?> alt="img42"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img43"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img43"]);?> alt="img43"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img44"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img44"]);?> alt="img44"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img45"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img45"]);?> alt="img45"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img46"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img46"]);?> alt="img46"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img47"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img47"]);?> alt="img47"></td>
                                <td align="center"><img id="<?php echo $imagenDiente["idimagen"];?>"src="<?php echo $imagenDiente["img48"];?>" <?php asignaAnchoYaltoAnumero($imagenDiente["img48"]);?> alt="img48"></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>