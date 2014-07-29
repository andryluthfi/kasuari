CREATE VIEW `post_kota` AS
select 
kota.kota_id,
kota.kota_name,
kota.kota_number,
kota.propinsi_id,
sum(tps.entries_count) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(tps.jokowi_count) as count_jokowi,
sum(tps.prabowo_count) as count_prabowo

from kota
	left join kecamatan on kecamatan.kota_id = kota.kota_id	
	left join kelurahan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	
group by kota.kota_id;
