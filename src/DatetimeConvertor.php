<?php

namespace DateConvertor;

class DatetimeConvertor
{
    protected string $datetime;
    protected string $format = 'Y-m-d';

    /**
     * @param string|null $datetime
     */
    public function __construct(?string $datetime = '')
    {
        if ($datetime) {

            $this->datetime = $datetime;

        } else {

            $this->datetime = date($this->format);

        }
    }

    /**
     *
     * Get Today Date.
     *
     * @param string|null $format
     *
     * @return string
     */
    public function today(?string $format = ''): string
    {

        // Replace date format when date format is given.
        if ($format) $this->format = $format;

        return date($this->format);

    }

    /**
     * @param string $format
     *
     * @return $this
     */
    public function asFormat(string $format): static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * Set result as display format.
     *
     * @return $this
     * @example 04/12/2022 (d/m/Y)
     *
     */
    public function asDisplayFormat(): static
    {
        // Set display date format.
        $this->format = 'd/m/Y';

        return $this;
    }

    /**
     * Set result as default sql format.
     *
     * @return $this
     * @example 2022-01-02 (Y-m-d)
     *
     */
    public function asSqlFormat(): static
    {

        // Set sql date format.
        $this->format = 'Y-m-d';

        return $this;
    }

    /**
     * get Date
     *
     * @param string|null $date
     *
     * @return string
     */
    public function getDate(?string $date = ''): string
    {

        if ($date) {
            $this->datetime = $date;
        }

        return date($this->format, strtotime($this->datetime));
    }

}