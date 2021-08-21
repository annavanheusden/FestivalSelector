using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;

/// <summary>
/// Summary description for CovidInfoProvider
/// </summary>
[WebService(Namespace = "http://cloud4090.kuleuvenuhasselt.be")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
// [System.Web.Script.Services.ScriptService]
public class CovidInfoProvider : System.Web.Services.WebService
{

    public CovidInfoProvider()
    {

        //Uncomment the following line if using designed components 
        //InitializeComponent(); 
    }

    private static int Teller = 0;

    private readonly double[,] CovidData = new double[6, 3] {
                                              {16.68, 3, 67},
                                              {14.13, 6, 65},
                                              {7.29, 15, 57},
                                              {30.15, 73, 57},
                                              {45.45, 96, 62},
                                              {28.26, 435, 52}
                                           };

    [WebMethod]
    public string CovidBesmettingen(int n)
    {
        return CovidData[(n-1), 0] + "";
    }

    [WebMethod]
    public string CovidSterftes(int n)
    {
        return CovidData[(n - 1), 1] + "";
    }

    [WebMethod]
    public string CovidVaccinatie(int n)
    {
        return CovidData[(n - 1), 2] + " %";
    }


}
