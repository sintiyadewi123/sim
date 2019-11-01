<?php
use App\Siswa;
use App\Guru;

function totalSiswa()
{
	return Siswa::count();
}

function totalGuru()
{
	return Guru::count();
}