<?php 
    require 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Webgis Properti</title>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="ol.css" type="text/css">
	<script src="ol.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" > 

	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="js/bootstrap.min.js" ></script>
	<style type="text/css">  
		.map {
    		position: absolute;
			height: 100%;
			width: 100%;
		}
		img {
			width: 100%;
		}
		.ol-popup {
        position: absolute;
        background-color: white;
        -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: -50px;
        min-width: 280px;
      }
      .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
      }
      .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
      }
      .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
      }
      .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
      }
      .ol-popup-closer:after {
        content: "✖";
      }

    </style>
</head>
<body>
<h2>My Map</h2>
<select id="cbo_layer" onchange="chg_layer(this.value)">
	<option value="osm">OSM</option>
	<option value="bing_aerial">Bing Aerial</option>
	<option value="bing_road">Bing Road</option>
</select>
<!-- <select id="cbo_lokasi" onchange="chg_lokasi(this.value)">
		<option value="112.756646|-7.277538|12">Surabaya</option>
		<option value="106.837571|-6.194148|12">Jakarta</option>
		<option value="115.184117|-8.324274|10">Bali</option>
</select> -->
<input type="checkBox" value="1" checked="1" onclick='toggle_kec()'/>kecamatan

<div class="row">
	<div class="col-lg-8">
		<div class="map" id="map" style="width: 100%; height: 550px;"></div>
	</div>
	<div class="col-lg-3" style="background-color: cyan"> 
		<!-- START DIGIT POINT ----------------------------------------------- -->
		<form>
			<h3>Manajemen Data POI</h3>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Jenis</label>
				<select class="form-control" id="jenis_point">
				<option>Mall</option>
				<option>Sekolah</option>
				<option>Pasar</option>
				<option>Tempat Wisata</option>
				<option>Restoran</option>
				</select>
			</div>
			<div class="form-group">
				<label>Nama Tempat</label>
				<input type="text" id="nama_point" class="form-control">
			</div>
			<div class="form-group">
				<label>Geometry</label>
				<textarea id="wkt_point" class="form-control"></textarea>
			</div>
			<div class="form-group"> 
				<button type="button" class="btn btn-warning" onclick="digit_point();">
					Digit Point POI
				</button>
				<button type="button" class="btn btn-warning" onclick="delete_point();">
					Delete Point POI
				</button>
				<button type="button" class="btn btn-danger" onclick="non_aktif_interaction();">
					Selesai Digit Point
				</button>
				<button type="button" class="btn btn-primary" onclick="simpan_point()">
					Simpan
				</button>
			</div>
		</form>
		<!-- END DIGIT POINT ----------------------------------------------- -->
		<!-- START DIGIT LINESTRING -----------------------------------------------
		<form>
			<h3>Tambah Linestring</h3>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" id="keterangan_line" class="form-control">
			</div>
			<div class="form-group">
				<label>Geometry</label>
				<textarea id="wkt_line" class="form-control"></textarea>
			</div>
			<div class="form-group"> 
				<button type="button" class="btn btn-warning" onclick="digit_line();">
					Digit Linestring
				</button>
				<button type="button" class="btn btn-danger" onclick="non_aktif_interaction();">
					Selesai Digit Linestring
				</button>
				<button type="button" class="btn btn-primary" onclick="simpan_line()">
					Simpan
				</button>
			</div>
		</form> -->
		<!-- END DIGIT LINESTRING ----------------------------------------------- -->
		<!-- START DIGIT POLYGON ----------------------------------------------- -->
		<form>
			<h3>Manajemen Data Properti</h3>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Kategori</label>
				<select class="form-control" id="kategori_poly">
				<option>Jual</option>
				<option>Sewa</option>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Jenis Properti</label>
				<select class="form-control" id="jenis_poly">
				<option>Rumah</option>
				<option>Ruko</option>
				<option>Gudang</option>
				<option>Kantor</option>
				<option>Tanah</option>
				</select>
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="number" min="0" id="harga_poly" class="form-control">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" id="alamat_poly" class="form-control">
			</div>
			<div class="form-group">
				<label>Luas Tanah</label>
				<input type="number" min="0" id="lt_poly" class="form-control">
			</div>
			<div class="form-group">
				<label>Luas Bangunan</label>
				<input type="number" min="0" id="lb_poly" class="form-control">
			</div>
			<form>
			<div class="form-group">
				<label for="exampleFormControlFile1">Gambar</label>
				<input type="file" class="form-control-file" id="gambar_poly">
			</div>
			</form>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Keterangan</label>
				<textarea class="form-control" id="keterangan_poly" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Geometry</label>
				<textarea id="wkt_poly" class="form-control"></textarea>
			</div>
			<div class="form-group"> 
				<button type="button" class="btn btn-warning" onclick="digit_poly();">
					Digit Polygon
				</button>
				<button type="button" class="btn btn-warning" onclick="delete_poly();">
					Delete Polygon
				</button>
				<button type="button" class="btn btn-danger" onclick="non_aktif_interaction();">
					Selesai Digit Polygon
				</button>
				<button type="button" class="btn btn-primary" onclick="simpan_poly()">
					Simpan
				</button>
			</div>
		</form>
		<!-- END DIGIT POLYGON ----------------------------------------------- -->
	</div>
</div>

<div id="popup" class="ol-popup">
    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
	<div id="popup-content"></div>
</div>


<script type="text/javascript"> 
	var style_icon_mall = new ol.style.Style({
		image: new ol.style.Icon({
			anchor: [0.5, 1],
			anchorXUnits: 'fraction',
			anchorYUnits: 'fraction',
			src: 'icons/commercial-places.png',
			opacity: 0.8
		})
	});
	var style_icon_sekolah = new ol.style.Style({
		image: new ol.style.Icon({
			anchor: [0.5, 1],
			anchorXUnits: 'fraction',
			anchorYUnits: 'fraction',
			src: 'icons/schools.png',
			opacity: 0.8
		})
	});
	var style_icon_pasar = new ol.style.Style({
		image: new ol.style.Icon({
			anchor: [0.5, 1],
			anchorXUnits: 'fraction',
			anchorYUnits: 'fraction',
			src: 'icons/shopping.png',
			opacity: 0.8
		})
	});
	var style_icon_tmptwisata = new ol.style.Style({
		image: new ol.style.Icon({
			anchor: [0.5, 1],
			anchorXUnits: 'fraction',
			anchorYUnits: 'fraction',
			src: 'icons/travel.png',
			opacity: 0.8
		})
	});
	var style_icon_restoran = new ol.style.Style({
		image: new ol.style.Icon({
			anchor: [0.5, 1],
			anchorXUnits: 'fraction',
			anchorYUnits: 'fraction',
			src: 'icons/restaurants.png',
			opacity: 0.8
		})
	});
	var bing_aerial = new ol.layer.Tile({
		source: new ol.source.BingMaps({
			key: 'As1HiMj1PvLPlqc_gtM7AqZfBL8ZL3VrjaS3zIb22Uvb9WKhuJObROC-qUpa81U5',
			imagerySet: 'Aerial'
		})
	});
	var bing_road = new ol.layer.Tile({
		source: new ol.source.BingMaps({
			key: 'As1HiMj1PvLPlqc_gtM7AqZfBL8ZL3VrjaS3zIb22Uvb9WKhuJObROC-qUpa81U5',
			imagerySet: 'Road'
		})
	});
	var osm = new ol.layer.Tile({
		source: new ol.source.OSM(),
		visible: true,
	});

	var kecamatan = new ol.layer.Vector({
		source: new ol.source.Vector({
			format: new ol.format.GeoJSON({
				defaultDataProjection: 'EPSG:4326'
			}),
			url: 'kecamatan.geojson'
		}),
		visible: true,
	}); 

	var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
	var closer = document.getElementById('popup-closer');
	var overlay = new ol.Overlay( ({
        element: container,
        autoPan: true,
        autoPanAnimation: {
          duration: 250
        }
      }));
       	closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
      };

	
	

	var view1 = new ol.View({
		center: ol.proj.fromLonLat([112.755907, -7.273507]),
		zoom: 12
	});  

	// variabel paten
	var format =  new ol.format.WKT();
	var feature;
	var features_point=[];
	// var features_linestring=[];
	var features_polygon=[];


	// START LAYER POINT ------------------------------------------
	var arr_point_mall = [];
    var arr_point_sekolah = [];
	var arr_point_pasar = [];
	var arr_point_tmptwisata = [];
    var arr_point_restoran = [];
	<?php 
	$sql = "SELECT * from lokasi";
	$result = $conn->query($sql);
	$i=0;
	while($r = $result->fetch_assoc()) {  
	?>
	  feature = format.readFeature('<?php echo $r['geom'] ?>', {
	        dataProjection: 'EPSG:4326',
	        featureProjection: 'EPSG:3857'
		  });
		  
	  feature.set('nama','<?php echo $r['nama'] ?>');
	  feature.set('jenis','<?php echo $r['jenis'] ?>');

	  features_point[<?php echo $i ?>]=feature;       
	<?php
	   $i++;  
	  }
	?> 

	var infoLokasi = function(pixel) {
			var feature = map.forEachFeatureAtPixel(pixel, function(feature) {
			return feature;
			});
			if (feature) {
			content.innerHTML =  feature.get('jenis') 
			+ '<br>'
			+ feature.get('nama')
			+ '<br>';
			} else {
			content.innerHTML = 'tidak ada lokasi terpilih';
			}
		};

	var style_poi = function () {
		return function (feature, resolution) {
			
			if (feature.get('jenis') == 'Mall') {
				return [style_icon_mall];
			} 
			else if (feature.get('jenis') == 'Sekolah'){
				return [style_icon_sekolah];
			}
			else if (feature.get('jenis') == 'Pasar'){
				return [style_icon_pasar];
			}
			else if (feature.get('jenis') == 'Tempat Wisata'){
				return [style_icon_tmptwisata];
			}
			else if (feature.get('jenis') == 'Restoran'){
				return [style_icon_restoran];
			}
		};
	};

	var source_point=new  ol.source.Vector({
	          features: features_point
	        });
	var lokasi_poi = new ol.layer.Vector({
			source: source_point,
			style: style_poi()
	      });
	// END LAYER POINT ------------------------------------------

	var vector_mall = new ol.layer.Vector({
    	source: new ol.source.Vector({
    		features: arr_point_mall
    	}),
    	style: style_icon_mall
	});
	var vector_sekolah = new ol.layer.Vector({
    	source: new ol.source.Vector({
    		features: arr_point_sekolah
    	}),
    	style: style_icon_sekolah
	});
	var vector_pasar = new ol.layer.Vector({
    	source: new ol.source.Vector({
    		features: arr_point_pasar
    	}),
    	style: style_icon_pasar
	});
	var vector_tmptwisata = new ol.layer.Vector({
    	source: new ol.source.Vector({
    		features: arr_point_tmptwisata
    	}),
    	style: style_icon_tmptwisata
	});
	var vector_restoran = new ol.layer.Vector({
    	source: new ol.source.Vector({
    		features: arr_point_restoran
    	}),
    	style: style_icon_restoran
    });
	// START LAYER LINESTRING ------------------------------------------
	// <?php 
	// $sql = "SELECT * from contoh_line";
	// $result = $conn->query($sql);
	// $i=0;
	// while($r = $result->fetch_assoc()) {  
	// ?>
	//   feature = format.readFeature('<?php echo $r['geom'] ?>', {
	//         dataProjection: 'EPSG:4326',
	//         featureProjection: 'EPSG:3857'
	//       });
	//   feature.set('info','<?php echo $r['keterangan'] ?>');
	//   features_linestring[<?php echo $i ?>]=feature;       
	// <?php
	//    $i++;  
	//   }
	// ?> 
	// var source_line=new  ol.source.Vector({
	//           features: features_linestring
	//         });
	// var contoh_line = new ol.layer.Vector({
	//         source: source_line
	//       });
	// END LAYER LINESTRING ------------------------------------------


	// START LAYER POLYGON ------------------------------------------
	// <?php 
	// $sql = "SELECT * from contoh_polygon";
	// $result = $conn->query($sql);
	// $i=0;
	// while($r = $result->fetch_assoc()) {  
	// ?>
	//   feature = format.readFeature('<?php echo $r['geom'] ?>', {
	//         dataProjection: 'EPSG:4326',
	//         featureProjection: 'EPSG:3857'
	//       });
	//   feature.set('info','<?php echo $r['keterangan'] ?>');
	//   features_polygon[<?php echo $i ?>]=feature;       
	// <?php
	//    $i++;  
	//   }
	// ?> 
	// var source_poly=new  ol.source.Vector({
	//           features: features_polygon
	//         });
	// var contoh_polygon = new ol.layer.Vector({
	//         source: source_poly
	//       });
	// END LAYER POLYGON ------------------------------------------

	var map = new ol.Map({
		target: 'map',
		controls: [
			//Define the default controls
			new ol.control.Zoom(),
			new ol.control.Rotate(),
			new ol.control.Attribution(),
			//Define some new controls
			new ol.control.ZoomSlider(),
			new ol.control.MousePosition(),
			new ol.control.ScaleLine(),
			new ol.control.OverviewMap()
		],
		layers: [
			osm
			, bing_aerial
			, bing_road
			, kecamatan
			, lokasi_poi
		],
		view: view1
	}); 

	function chg_layer(tipe) {
		// alert(tipe);
		bing_aerial.setVisible(false);
		bing_road.setVisible(false);
		osm.setVisible(false);

		if (tipe == 'bing_aerial') bing_aerial.setVisible(true);
		if (tipe == 'bing_road') bing_road.setVisible(true);
		if (tipe == 'osm') osm.setVisible(true);
	}

	// function chg_lokasi(val) {
	// 	// alert(val);

	// 	var res = val.split('|');
	// 	var koor_x = res[0];
	// 	var koor_y = res[1];
	// 	var zoom = res[2];
	// 	// alert(koor_x);

	// 	// map.getView().setCenter(ol.proj.transform([koor_x, koor_y], 'EPSG:4326', 'EPSG:3857'));
	// 	// map.getView().setZoom(zoom);


	// 	view1.animate({
	// 		center: ol.proj.fromLonLat([koor_x, koor_y]),
	// 		zoom: zoom,
	// 		duration: 2000
	// 	});
	// } 

	function toggle_kec() {
		kecamatan.setVisible(!kecamatan.getVisible());
	}

	$(document).ready(function () {
		// onload();
		chg_layer($('#cbo_layer').val());
	});

	var draw;
	function digit_point() {
		// mengaktifkan fungsi draw
		draw = new ol.interaction.Draw({
			source: source_point,
			type: 'Point'
		});
		map.addInteraction(draw);
		draw.on('drawend', function(evt){
			var feature = evt.feature;
			var geom = feature.getGeometry().clone();
			geom=geom.transform('EPSG:3857','EPSG:4326');
			var wkt  = format.writeGeometry(geom);
			$('#wkt_point').val(wkt)  ;
		}); 
	} 
	// function digit_line() {
	// 	// mengaktifkan fungsi draw
	// 	draw = new ol.interaction.Draw({
	// 		source: source_point,
	// 		type: 'LineString'
	// 	});
	// 	map.addInteraction(draw);
	// 	draw.on('drawend', function(evt){
	// 		var feature = evt.feature;
	// 		var geom = feature.getGeometry().clone();
	// 		geom=geom.transform('EPSG:3857','EPSG:4326');
	// 		var wkt  = format.writeGeometry(geom);
	// 		$('#wkt_line').val(wkt)  ;
	// 	}); 
	// } 
	function digit_poly() {
		// mengaktifkan fungsi draw
		draw = new ol.interaction.Draw({
			source: source_point,
			type: 'Polygon'
		});
		map.addInteraction(draw);
		draw.on('drawend', function(evt){
			var feature = evt.feature;
			var geom = feature.getGeometry().clone();
			geom=geom.transform('EPSG:3857','EPSG:4326');
			var wkt  = format.writeGeometry(geom);
			$('#wkt_poly').val(wkt)  ;
		}); 
	} 

	function simpan_point(){
		var jenis = $('#jenis_point').val();
		var nama = $('#nama_point').val();
		var wkt = $('#wkt_point').val();
		
 
		var url ="simpan_point.php?nama="+nama+'&wkt='+wkt+'&jenis='+jenis;
	    $.ajax({
	        url: url,
	        success: function(data){
	        	// ketika berhasil simpan, kursor kembali normal
	        	non_aktif_interaction();
	        	alert(data);   
	        }
	    });

	}
	// function simpan_line(){
	// 	var keterangan = $('#keterangan_line').val();
	// 	var wkt = $('#wkt_line').val();
 
	// 	var url ="simpan_line.php?keterangan="+keterangan+'&wkt='+wkt;
	//     $.ajax({
	//         url: url,
	//         success: function(data){
	//         	// ketika berhasil simpan, kursor kembali normal
	//         	non_aktif_interaction();
	//         	alert(data);   
	//         }
	//     });

	// }
	function simpan_poly(){
		var keterangan = $('#keterangan_poly').val();
		var wkt = $('#wkt_poly').val();
 
		var url ="simpan_poly.php?keterangan="+keterangan+'&wkt='+wkt;
	    $.ajax({
	        url: url,
	        success: function(data){
	        	// ketika berhasil simpan, kursor kembali normal
	        	non_aktif_interaction();
	        	alert(data);   
	        }
	    });

	}

	function non_aktif_interaction(){
					// memanggil draw yang diatas
		map.removeInteraction(draw);
	}
	map.on('singleclick', function(evt) {
        var coordinate = evt.coordinate;
        infoLokasi(evt.pixel);
        overlay.setPosition(coordinate);
      });

      
   	map.addOverlay(overlay);

</script>
</body>
</html>