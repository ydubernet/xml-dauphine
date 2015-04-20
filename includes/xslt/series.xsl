<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:param name="code_serie"/>
	<xsl:param name="serie"/>
	<xsl:param name="begin"/>
	<xsl:param name="end"/>
    <xsl:output method="html"/>


   <xsl:template match="/dblp">
		<h2 style="text-align:center;">Les Séries</h2>
			<ul style="width: 100% ;">
            <xsl:apply-templates select="descendant::series[contains(.,$serie)][starts-with(@href,concat('db/series/',$code_serie))][not(preceding::series/@href = @href)]">
				<xsl:sort select="." data-type="text" />
			</xsl:apply-templates>
			</ul>
    </xsl:template>
	
	
	<xsl:template match="series">
		<xsl:if test="position() = ($begin + 1) ">
			<table>
			<tr>
			<xsl:if test="$begin &gt; 0">
				<td>
					<form method="GET">
					<input type="hidden" name="pg_BEGIN" >
						<xsl:attribute name="value">
								<xsl:value-of select="($begin - ($end - $begin))"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_SERIE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$serie"/>
							</xsl:attribute>
						</input>
						
						<input type="hidden" name="pg_CODE_SERIE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$code_serie"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_SIZE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$end - $begin"/>
							</xsl:attribute>
						</input>
						<input type="submit" value="Précédent"/>
					</form>
				</td>
			</xsl:if>
			<xsl:if test="last() &gt; $end">
				<td>
					<form method="GET">
						<input type="hidden" name="pg_SERIE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$serie"/>
							</xsl:attribute>
						</input>
						
						<input type="hidden" name="pg_CODE_SERIE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$code_serie"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_SIZE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$end - $begin"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_BEGIN" >
						<xsl:attribute name="value">
								<xsl:value-of select="$end"/>
							</xsl:attribute>
						</input>
						<input type="submit" value="Suivant"/>
					</form>
				</td>
				
			</xsl:if>
			</tr>
			</table>	
		</xsl:if>
		
	
		<xsl:if test="position()&gt; $begin and position()&lt; ($end+1)">
			<li style="width : 33%;float:left;">
                            <xsl:value-of select="."/>
			</li>			
		</xsl:if>
	</xsl:template>
	

</xsl:stylesheet>
