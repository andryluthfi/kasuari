CREATE VIEW `post_kota` AS
select 
kota.kota_id,
kota.kota_name,
kota.kota_number,
kota.propinsi_id,
count(input.tps_id) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(input.jokowi_count) as count_jokowi,
sum(input.prabowo_count) as count_prabowo

from kota
	left join kecamatan on kecamatan.kota_id = kota.kota_id	
	left join kelurahan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	left join input on tps.tps_id = input.tps_id 
	
group by kota.kota_id;
