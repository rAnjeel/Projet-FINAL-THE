-- ahazoana ny prix de vente / kg mifanaraka amle izy
select prixVente from variete as v join parcelle as p on v.idVariete = p.idVariete join cueillette as c on p.idParcelle 
= c.idParcelle where c.idCueillette = 1;

-- jointure 3 relations
select * from variete as v join parcelle as p on v.idVariete = p.idVariete join cueillette as c on p.idParcelle = c.idParcelle 
where c.idCueillette = 1;

DELETE FROM pointCueilleur WHERE idPoint = 1;

-- angalana ny ambony id indrindra amle table
select * from pointCueilleur order by idPoint desc limit 1;

-- somme salaire
select sum(s.salaire) as total_montant from salaire as s join cueillette as c on s.idCueilleur = c.idCueilleur where c.dateCueillette >= '2023-12-25' 
and c.dateCueillette <= '2024-02-11';

-- vente total
select sum(prixVente * c.poids) as total_vente from  parcelle as p join cueillette as c on p.idParcelle = c.idParcelle join
 variete as v on v.idVariete = p.idVariete

-- ahazoana ny poids de feuille espéré amna parcelle iray atao x10000 ilay surface satria convertisser na
 select sum(((p.surface * 10000) / v.occupation) * v.rendement ) as total_feuille from variete as v join parcelle 
 as p on v.idVariete = p.idVariete where p.idParcelle = 1;

-- ahazoana ny poids de feuille espéré amin'ny parcelle rehetra anatina intervalle de date
 select sum(((surface * 10000) / occupation) * rendement ) as total_rendement from variete as v join parcelle as p on v.idVariete = p.idVariete join cueillette as c 
 on c.idParcelle = p.idParcelle where c.dateCueillette >= '2023-12-25' and c.dateCueillette <= '2024-02-11';

-- total cueillette rehtra anatina intervalle de date
 select sum(poids) as total from cueillette where dateCueillette >= '2023-12-25' and dateCueillette <= '2024-02-11';

update salaire set salaire = '20000' where idSalaire = 1;

-- login
select * from admin where email = 'thomis@gmail.com' and pwd = '1234' and statut = 'admin';

-- nombre de pied en entier 
select idParcelle, round((surface * 10000) / occupation) as nombre_pied from parcelle as p join variete as v 
on p.idVariete = v.idVariete group by idParcelle;