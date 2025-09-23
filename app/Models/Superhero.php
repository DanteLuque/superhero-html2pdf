<?php

namespace App\Models;
use CodeIgniter\Model;

class Superhero extends Model
{
  protected $table = "superhero";
  protected $primaryKey = ["id"];
  protected $allowedFields = [
    "superhero_name",
    "full_name",
    "full_name",
    "gender_id",
    "eye_colour_id",
    "hair_colour_id",
    "skin_colour_id",
    "race_id",
    "publisher_id",
    "alignment_id",
    "height_cm",
    "weight_kg",
  ];

  public function getSuperHeroByPublisher($publisherId)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('superhero SH');

    $builder->select('
                SH.id,
                SH.superhero_name,
                SH.full_name,
                PB.id AS publisher_id,
                PB.publisher_name,
                AL.alignment
              ');

    $builder->join('publisher PB', 'PB.id = SH.publisher_id', 'left');
    $builder->join('alignment AL', 'AL.id = SH.alignment_id', 'left');
    $builder->orderBy('SH.superhero_name', 'desc');
    $builder->where('SH.publisher_id', $publisherId);

    return $builder->get()->getResultArray();
  }

  public function getSuperHeroByRaceAndAlignment($raceId, $alignmentId)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('superhero SH');

    $builder->select('
                SH.id,
                SH.superhero_name,
                SH.full_name,
                AL.alignment,
                R.race
              ');

    $builder->join('alignment AL', 'AL.id = SH.alignment_id', 'inner');
    $builder->join('race R', 'R.id = SH.race_id', 'inner');
    $builder->orderBy('SH.superhero_name', 'desc');
    $builder->where('SH.race_id', $raceId);
    $builder->where('SH.alignment_id', $alignmentId);

    return $builder->get()->getResultArray();
  }
}