<?php

namespace App\Services;

class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        return array(
            'id' => $currency->getId(),
            'name' => $currency->getName(),
            'short_name' => $currency->getShortName(),
            'actual_course' => $currency->getActualCourse(),
            'actual_course_date' => $currency->getActualCourseDate(),
            'active' => $currency->isActive()
        );
    }

    public static function presentCollection(array $currencies): array
    {
        $json = [];
        foreach ($currencies as $currency) {
            $json[] = CurrencyPresenter::present($currency);
        }
        return $json;
    }
}
