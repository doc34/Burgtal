select materials.material
FROM materials
right Join preisliestes on materials.id = materials.id
ORDER BY material_id
