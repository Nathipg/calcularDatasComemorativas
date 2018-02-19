<?php

class Data {

	public function quantidadeDiasMes( $mes = null, $ano = null ) {
		$mes = $mes == null ? date('m') : $mes;
		$ano = $ano == null ? date('Y') : $ano;
		return cal_days_in_month( CAL_GREGORIAN, $mes, $ano );
	}

	public function diaSemanaData( $dia = null, $mes = null, $ano = null ) {
		$dia = $dia == null ? date('d') : $dia;
		$mes = $mes == null ? date('m') : $mes;
		$ano = $ano == null ? date('Y') : $ano;
		return date( 'w', mktime( 0, 0, 0, $mes, $dia, $ano) );
	}

	public function getDataPorOcorrenciaMes ( $diaSemana = -1, $mes = null, $ano = null, $numOcorrencias = 1 ) {
		if( $diaSemana == -1 ) {
			die( json_encode( array( 'sucesso' => false, 'erro' => 'O dia da semana não pode ser nulo' ) ) );
		}

		if( $mes == null ) {
			die( json_encode( array( 'sucesso' => false, 'erro' => 'O mês não pode ser nulo' ) ) );
		}

		if( $ano == null ) {
			die( json_encode( array( 'sucesso' => false, 'erro' => 'O ano não pode ser nulo' ) ) );
		}

		$qtdDiasMes = $this->quantidadeDiasMes( $mes );

		$contOcorrencias = 0;

		for( $i = 1; $i < $qtdDiasMes; $i++ ) {
			if( $this->diaSemanaData( $i, $mes, $ano ) == $diaSemana ) {
				$contOcorrencias++;
			}

			if( $numOcorrencias == $contOcorrencias ) {
				die( json_encode( array( 'sucesso' => true, 'data' => "$ano-$mes-$i" ) ) );
			}
		}

	}

}