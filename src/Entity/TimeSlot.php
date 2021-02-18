<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TimeSlotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimeSlotRepository::class)
 */
class TimeSlot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private \DateInterval $timeInterval;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private Task $task;

    /**
     * @ORM\ManyToOne(targetEntity=WorkDay::class, inversedBy="timeSlots")
     * @ORM\JoinColumn(nullable=false)
     */
    private WorkDay $workDay;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTimeInterval(): \DateInterval
    {
        return $this->timeInterval;
    }

    public function setTimeInterval(\DateInterval $timeInterval): void
    {
        $this->timeInterval = $timeInterval;
    }

    public function getTask(): Task
    {
        return $this->task;
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    public function getWorkDay(): WorkDay
    {
        return $this->workDay;
    }

    public function setWorkDay(WorkDay $workDay): void
    {
        $this->workDay = $workDay;
    }
}
