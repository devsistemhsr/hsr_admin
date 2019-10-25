select
ltrim(rtrim(p.codigo)) as IDENT,
CONCAT(ltrim(rtrim(tipo_c)),' - ',ltrim(rtrim(p.codigo))) as IDENTIFICACION,
CONCAT(ltrim(rtrim(ppellido)),' ',ltrim(rtrim(sapellido)),' ',ltrim(rtrim(p.nombre)),' ',ltrim(rtrim(snombre))) as NOMBRE,
convert(date,fecha_nac) as F_NAC,
(
 CASE sexo
 WHEN 1 THEN 'Masculino'
 WHEN 2 THEN 'Femenino'
 END
) as SX,
p.direccion as DIR,p.telefono as TEL, m.nom_mun as MUNIC,ltrim(rtrim(a.nombre)) as EPS,o.nombre as OCUPACION,
(
 CASE Estadocivil
 WHEN 1 THEN 'Soltero(a)'
 WHEN 2 THEN 'Casado(a)'
 WHEN 3 THEN 'Separado(a)'
 WHEN 4 THEN 'Viudo(a)'
 WHEN 5 THEN 'Union Libre'
 END
)
 as EST_C,
ltrim(rtrim(acompañante)) as N_ACOMP,ltrim(rtrim(telacompañante)) as T_ACOMP,ltrim(rtrim(parentesco)) as P_ACOMP,
ltrim(rtrim(responsable)) as RESPONSABLE,ltrim(rtrim(telresponsable)) as T_RESONSABLE
from paciente as p 
left join ocupacion as o on p.ocupacion=o.codigo
inner join consulta01 as c on p.codigo=c.codigo and c.fecha='99999999'
inner join admin as a on c.cod_admin=a.codigo
inner join municipio as m on p.cod_depart=m.cod_dep and p.cod_mun=m.cod_mun
where p.codigo='9999999999'
