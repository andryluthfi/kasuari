CREATE VIEW `post_provinsi` AS
select 
propinsi.propinsi_id,
propinsi_name,
propinsi_number,
count(input.tps_id) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(input.jokowi_count) as count_jokowi,
sum(input.prabowo_count) as count_prabowo

from propinsi 
	left join kota on kota.propinsi_id = propinsi.propinsi_id
	left join kecamatan on kecamatan.kota_id = kota.kota_id	
	left join kelurahan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	left join input on tps.tps_id = input.tps_id 
	
group by propinsi.propinsi_id;
