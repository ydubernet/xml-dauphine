<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : article.xsl
    Created on : April 16, 2015, 12:38 AM
    Author     : MinhHieu
    Description:
        Purpose of transformation follows.
-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"   version="1.0">
    <xsl:param name="search_condition"></xsl:param>
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="dblp">
        <form> 
            <div id="rcorners2">
                <xsl:for-each select="article[contains(title/text(),$title) and contains(author/text(),$author)]">
                    <li>
                        <span>
                            <xsl:for-each select="author">
                                <xsl:value-of select="text()"/>,
                            </xsl:for-each>
                        </span>
                        <br/>
                        <span>
                            <xsl:value-of select="title/text()"/>
                        </span>
                        <br/>
                        <span>
                            <xsl:value-of select="pages/text()"/>
                        </span>
                        <br/>
                        <span>
                            <xsl:value-of select="volume/text()"/>
                        </span>
                        <br/>
                        <!--<span>
                            <xsl:value-of select="journal/text()"/>
                        </span><br/>-->
                        <!--<span>
                            <xsl:value-of select="number/text()"/>
                        </span><br/>-->
                        <!--<span>
                            <xsl:value-of select="url/text()"/>
                        </span><br/>-->
                    </li>
                </xsl:for-each>
            </div>  
        </form> 
    </xsl:template>
</xsl:stylesheet>
