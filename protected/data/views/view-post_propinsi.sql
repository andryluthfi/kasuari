CREATE VIEW `post_provinsi` AS
select 
propinsi.propinsi_id,
propinsi_name,
propinsi_number,
sum(tps.entries_count) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(tps.jokowi_count) as count_jokowi,
sum(tps.prabowo_count) as count_prabowo

from propinsi 
	left join kota on kota.propinsi_id = propinsi.propinsi_id
	left join kecamatan on kecamatan.kota_id = kota.kota_id	
	left join kelurahan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	
group by propinsi.propinsi_id;