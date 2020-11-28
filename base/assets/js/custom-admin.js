(function($){
	var Util = window.Util = {
		hideMetabox: function(){
			$('body.post-type-collection .metabox-holder #postbox-container-2 .postbox:not(.never-hide)').removeClass('option-is-show').addClass('option-is-hide');
			$('body.post-type-directory .metabox-holder #postbox-container-2 .postbox').removeClass('option-is-show').addClass('option-is-hide');
		},
		showMetabox: function(value){
			var $metabox = $('body.post-type-collection .metabox-holder #postbox-container-2, body.post-type-directory .metabox-holder #postbox-container-2'),
				value = parseInt(value);
			
			switch (value) {
				case 43: // Arsip Web
					//$metabox.find('').addClass('option-is-show');
					break;
				case 29: // Artikel, Surat Kabar dan Majalah
					$metabox.find('#article').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 85: // Buku Elektronik
					$metabox.find('#ebook').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 30: // Buku Langka
					$metabox.find('#rare_book').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 38: // Koleksi Foto
					$metabox.find('#foto').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 39: // Koleksi Lukisan
					$metabox.find('#painting').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 31: // Literatur Kelabu
					$metabox.find('#gray_literature').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 32: // Majalah Langka
					$metabox.find('#rare_magazine').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 33: // Manuskrip
					$metabox.find('#manuscripts').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 34: // Pernaskahan Nusantara
					$metabox.find('#').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 40: // Pesona Indonesia
					$metabox.find('#panorama').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 35: // Produk Hukum
					$metabox.find('#laws').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 41: // Rekaman Video
					$metabox.find('#video').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 36: // Visi Pustaka
					//$metabox.find('').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 703: // Hari Penting
					$metabox.find('#directory_day').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 704: // Kantor Berita
					$metabox.find('#news_office').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 714: // Kedutaan Besar dan Konsula Asing
					$metabox.find('#ambassador_consulat').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 705: // Lembaga Kesehatan
					$metabox.find('#health_institude').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 706: // Lembaga Pemerintahan
					$metabox.find('#government_institude').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 707: // Media Massa Online
					$metabox.find('#mass_media').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 708: // Nomor Telepon Penting
					$metabox.find('#emergency_call').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 710: // Penerbit
					$metabox.find('#publisher').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 709: // Penyedia Jasa Internet
					$metabox.find('#isp').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 712: // Perpustakaan Khusus
					$metabox.find('#special_library').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 713: // Perpustakaan Nasional
					$metabox.find('#national_library').removeClass('option-is-hide').addClass('option-is-show');
					break;
				case 711: // Perpustakaan Online
					$metabox.find('#online_library').removeClass('option-is-hide').addClass('option-is-show');
					break;
				default: // Default
					$metabox.find('#directory').removeClass('option-is-hide').addClass('option-is-show');
					break;
			}
		}
	};

	var App = window.App = {
		initCollectionMetabox: function(){
			$(document).ready(function($) {
				var $checkedRadio = $('#collection_categorychecklist input:checked')
					value = $checkedRadio.val();
				Util.hideMetabox();
				Util.showMetabox(value);

				$('#collection_categorychecklist input').on("change", function(){
					var value = $('#collection_categorychecklist input:checked').val();
					Util.hideMetabox();
					Util.showMetabox(value);
				});
			});
		},
		initDictionaryMetabox: function(){
			$(document).ready(function($) {
				var $checkedRadio = $('#category_directorychecklist input:checked')
					value = $checkedRadio.val();
				Util.hideMetabox();
				Util.showMetabox(value);

				$('#category_directorychecklist input').on("change", function(){
					var value = $('#category_directorychecklist input:checked').val();
					
					console.log(value);

					Util.hideMetabox();
					Util.showMetabox(value);
				});
			});
		},
		init: function(){
			//App.initCollectionMetabox();
			App.initDictionaryMetabox();
		}
	};

	App.init();

})(jQuery);