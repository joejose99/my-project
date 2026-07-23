Imports System.Data.OleDb
Public Class frmEditWorkers
    Private codes As String

    Private Sub dtptEdit_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellClick
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()
    End Sub
    Private cel1, cel2, cel3, cel4, cel5 As String
    Private id As Integer
    Private NoDpart As String
    Private Midss As String
    Private vMemb As String
    Private Sub dtptEdit_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentClick
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        id = dtptEdit.CurrentRow.Cells(8).Value()
        NoDpart = dtptEdit.CurrentRow.Cells(2).Value()
    End Sub
    Private Sub dtptEdit_CellMouseDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellMouseEventArgs) Handles dtptEdit.CellMouseDoubleClick
        'cel1 = dtptEdit.ProductName
        NoDpart = dtptEdit.CurrentRow.Cells(2).Value()
        Midss = dtptEdit.CurrentRow.Cells(2).Value()
        vMemb = dtptEdit.CurrentRow.Cells(2).Value()

        id = dtptEdit.CurrentRow.Cells(8).Value()
        cel2 = dtptEdit.CurrentCell.ColumnIndex
        cel3 = dtptEdit.CurrentCell.ColumnIndex
        cel1 = dtptEdit.CurrentCell.ColumnIndex
        cel4 = dtptEdit.CurrentCell.ColumnIndex
        cel5 = dtptEdit.CurrentCell.ColumnIndex
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        _stid = ""


        If cel1 = "1" Then
            butDelete.Visible = True
            Me.butEdit.Visible = True

            frmDptPuup.MdiParent = mdiChurch
            frmDptPuup.Show()
            frmDptPuup.BringToFront()
            frmDptPuup.WindowState = FormWindowState.Normal
        End If


        If cel3 = "3" Then
            butDelete.Visible = True
            Me.butEdit.Visible = True

            frmDptPuup.MdiParent = mdiChurch
            frmDptPuup.Show()
            frmDptPuup.BringToFront()
            frmDptPuup.WindowState = FormWindowState.Normal
        End If
        

        If cel2 = "2" Then
            butDelete.Visible = True
            Me.butEdit.Visible = True

            frmDptPuup.MdiParent = mdiChurch
            frmDptPuup.Show()
            frmDptPuup.BringToFront()
            frmDptPuup.WindowState = FormWindowState.Normal
        End If

        If cel3 = "3" Then
            butDelete.Visible = True
            Me.butEdit.Visible = True

            frmDptPuup.MdiParent = mdiChurch
            frmDptPuup.Show()
            frmDptPuup.BringToFront()
            frmDptPuup.WindowState = FormWindowState.Normal
        End If

        If cel4 = "4" Then
            butDelete.Visible = True
            Me.butEdit.Visible = True

            frmDptPuup.MdiParent = mdiChurch
            frmDptPuup.Show()
            frmDptPuup.BringToFront()
            frmDptPuup.WindowState = FormWindowState.Normal
        End If

        If cel5 = "5" Then
            butDelete.Visible = True
            Me.butEdit.Visible = True

            frmDptPuup.MdiParent = mdiChurch
            frmDptPuup.Show()
            frmDptPuup.BringToFront()
            frmDptPuup.WindowState = FormWindowState.Normal
        End If

    End Sub

    Private _stid As String
    Private mids As String

    Public Property MId() As String
        Get
            Return _stid
        End Get
        Set(ByVal value As String)
            _stid = value
            mids = _stid





            Try
                Dim sqlString As String = ""
                Dim surname As String = ""
                Dim fname As String = ""
                Dim mbId As String = ""
                Dim MOBILE As String = ""
                Call conns()

                str_sql_user_select = "SELECT * FROM  Church where vMemberId= '" & mids & "'"

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    mbId = myAccessReader("vMemberId")
                    'dtptEdit.CurrentRow.Cells(3).Value = myAccessReader("vFname")
                    surname = myAccessReader("vSurname")
                    fname = myAccessReader("vFname")
                    MOBILE = myAccessReader("vMobile")

                    ' Me.TextBox10.Text = myAccessReader("vMidName")




                    ro += 1

                End While
                If codes <> "" Then
                    dtptEdit.CurrentRow.Cells(2).Value = mbId
                    dtptEdit.CurrentRow.Cells(3).Value = surname
                    dtptEdit.CurrentRow.Cells(4).Value = fname
                    dtptEdit.CurrentRow.Cells(5).Value = MOBILE
                End If
                myAccessReader.Close()
                strconss.Close()
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property
    Private Sub frmEditWorkers_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 920

        '327

        Me.Height = 546

        Me.MdiParent = mdiChurch
        Call lstme()
        Call requery()

        butEdit.Visible = False
        butDelete.Visible = False
        txtCCode.Text = ""
        Me.txtCourseName.Text = ""
        Me.TextBox1.Text = ""
        Me.TextBox2.Text = ""
    End Sub

    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        printNo = 0


        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        ' lst()
        PrintBIll()
        If PrintPreviewDialog1.Created = False Then
            '    code = ""
        End If
        intJoe = 0
    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer

    Public Sub PrintBIll()
        ' Dim Y As Integer


        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Details", 800, 1000)
            .Margins.Top = 15
            .Margins.Bottom = 20
            .PaperSize = Ps
        End With

        headfont = New Font("Courier New", 16, FontStyle.Bold)
        tablefont = New Font("Times New Roman", 8, FontStyle.Bold)
        titlefont = New Font("Times New Roman", 8)
        X1 = PrintDocument1.DefaultPageSettings.Margins.Left
        'X1 = X1 + 10
        Dim pageWidth As Integer

        With PrintDocument1.DefaultPageSettings
            pageWidth = .PaperSize.Width - .Margins.Left - .Margins.Right
        End With

        X2 = X1 + 120
        X3 = X2 + pageWidth * 0.5
        W1 = X2 - X1
        W2 = X3 - X2
        W3 = pageWidth - X3

        If printNo = 0 Then
            PrintPreviewDialog1.Document = PrintDocument1
            PrintPreviewDialog1.ShowDialog()
        End If
        If printNo = 1 Then
            PrintDocument1.PrintController = New Printing.StandardPrintController
            PrintDocument1.Print()
        End If



    End Sub
    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String

    Private Yc As Integer
    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer
    Private Sub lstme()
        Try
            Dim ro As Integer = 0
            'Dim array_STId2(array_STId1) As String
            'Dim array(array_STId1) As String
            Dim stid As String = ""



            Dim rowsOrder As Integer = 0

            Dim studentid As String = ""

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   DepartMember "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim rows As Integer
            While myAccessReader.Read
                rowsOrder = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
           
            'mycon.Close()
            strconss.Close()

            If rowsOrder <> 0 Then
                Call conns()
                Me.ListItems.Items.Clear()
                str_sql_user_select = "SELECT *   FROM   DepartMember "

                ' str_sql_user_select = "SELECT vSurname,vFname,vMobile FROM Church JOIN Department on Church.vMemberId= Department.vMemberId"

                'str_sql_user_select = "SELECT vSurname,vFname,vMobile,vMemberId from Church where vMemberId =(Select vMemberId,vDepartName  from Department )"
                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ro = 0
                While rowsOrder <> ro

                    While myAccessReader.Read()
                        stid = myAccessReader("vMemberId")

                        ' array_STId2(nos) = stid

                        Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                        'nos += 1
                        ro += 1
                        'intJoe = ro
                    End While

                End While

                'mycon.Close()
                strconss.Close()

            End If
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub requery()
        Try
            Dim rows As Integer
            Dim studentid As String = ""
            Dim itmss As Integer = 0
            Dim exitlopp As Integer = 0

            'If CheckBox1.Checked = True Then
            txtCourseName.Enabled = False
            ' txtCCode.Enabled = False
            txtSec.Enabled = False
            txtSem.Enabled = False
            TextBox1.Text = ""
            TextBox2.Text = ""
            ComboBox1.Text = ""
            Label8.Visible = False
            DateTimePicker1.Enabled = False


            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember]"
            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

           
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            exitlopp = rows
            ' exitlopp -= 1
            dtptEdit.Rows.Clear()

            If rows <> 0 Then
                dtptEdit.Rows.Add(rows)
                Dim ro As Integer = 0
                'For Each i As String In Me.ListItems.Items(itmss).ToString

                'studentid = Me.ListItems.Items(itmss).ToString
                Call conns()
                ' str_sql_user_select = "SELECT *  FROM Department"

                str_sql_user_select = "select  DEPARTMEMBER.vDepartName,DEPARTMEMBER.vDepartCode,DEPARTMEMBER.dDate,DEPARTMEMBER.Id,DEPARTMEMBER.vHeadofDepartId,CHURCH.vSurname,CHURCH.vFname,CHURCH.vMobile,CHURCH.vMemberId from CHURCH INNER JOIN [DEPARTMEMBER]  On CHURCH.vMemberId = DEPARTMEMBER.vMemberId  "


                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))

                'If dr.Read.Equals(True) Then

                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vFname")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vHeadofDepartId")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("ddate")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("id")


                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1
                    itmss += 1
                    'End If
                End While
                ' If exitlopp = itmss Then
                'Exit For
                ' End If
                '  Next

                'mycon.Close()
                strconss.Close()
                'End If



                Call conns()
                ComboBox1.Items.Clear()

                ComboBox1.Text = ""

                ' str_sql_user_select = "SELECT DISTINCT(vSection)AS [RecordYear]  FROM student "
                str_sql_user_select = "SELECT  DISTINCT(vDepartName)AS [RecordYear]FROM DepartMember   "



                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                'Dim ro As Integer = 0
                'While myreader.Read()
                While myAccessReader.Read()

                    ComboBox1.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                End While
                'myreader.Close()
                'mycon.Close()

                myAccessReader.Close()
                strconss.Close()
                Dim total As String = ""
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT Distinct(vMemberId) AS [RecordCount] FROM  [DepartMember]"
                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                While myAccessReader.Read
                    total = myAccessReader("RecordCount")
                    ro += 1
                End While
                Label6.Text = CStr(ro)
                myAccessReader.Close()
                strconss.Close()
                'Label6
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox1_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox1.KeyUp
        Try
            CheckBox1.Checked = False
            Label8.Visible = False
            TextBox2.Text = ""
            ComboBox1.Text = ""

            Dim itmss As Integer = 0
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DEPARTMEMBER]  "

            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            Dim studentid As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()



            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                'str_sql_user_select = "SELECT *  FROM Department "
                'str_sql_user_select = "SELECT * FROM Department where vDepartName  like '" & txtCCode.Text & "%'  "


                'For Each i As String In Me.ListItems.Items(itmss).ToString

                studentid = Me.ListItems.Items(itmss).ToString
                Call conns()
                ' str_sql_user_select = "SELECT *  FROM Department"

                str_sql_user_select = "select  DEPARTMEMBER.vDepartName,DEPARTMEMBER.vDepartCode,DEPARTMEMBER.dDate,DEPARTMEMBER.Id,DEPARTMEMBER.vHeadofDepartId,CHURCH.vSurname,CHURCH.vFname,CHURCH.vMobile,CHURCH.vMemberId from CHURCH INNER JOIN [DEPARTMEMBER]  On CHURCH.vMemberId = DEPARTMEMBER.vMemberId where CHURCH.vSurname  like '" & TextBox1.Text & "%'  "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vFname")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vHeadofDepartId")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("dDate")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("id")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                'Next
                strconss.Close()
                ' mycon.Close()




                'Call conns()
                'ComboBox1.Enabled = False


            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

   

    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        Try

            CheckBox1.Checked = False
            Label8.Visible = False
            Dim itmss As Integer = 0
            Call conns()
            ComboBox1.Text = ""
            TextBox1.Text = ""
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember]  "

            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            Dim studentid As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()



            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                'str_sql_user_select = "SELECT *  FROM Department "
                'str_sql_user_select = "SELECT * FROM Department where vDepartName  like '" & txtCCode.Text & "%'  "


                'For Each i As String In Me.ListItems.Items(itmss).ToString

                studentid = Me.ListItems.Items(itmss).ToString
                Call conns()
                ' str_sql_user_select = "SELECT *  FROM Department"

                str_sql_user_select = "select  DEPARTMEMBER.vDepartName,DEPARTMEMBER.vDepartCode,DEPARTMEMBER.dDate,DEPARTMEMBER.Id,DEPARTMEMBER.vHeadofDepartId,CHURCH.vSurname,CHURCH.vFname,CHURCH.vMobile,CHURCH.vMemberId from CHURCH INNER JOIN [DEPARTMEMBER]  On CHURCH.vMemberId = DEPARTMEMBER.vMemberId where Church.vFName  like '" & TextBox2.Text & "%'  "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vFname")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vHeadofDepartId")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("ddate")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("id")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                ' Next
                strconss.Close()
                ' mycon.Close()




                'Call conns()
                'ComboBox1.Enabled = False


            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub

    Private Sub ComboBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.SelectedIndexChanged
        Try
            'CheckBox1.Checked = False
            Dim itmss As Integer = 0
            Dim exitlopp As Integer = 0
            Label8.Visible = True
            TextBox2.Text = ""
            TextBox1.Text = ""
            Call conns()

            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember] where vDepartName  = '" & ComboBox1.Text & "' "

            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            Dim studentid As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                ' rowme = myAccessReader("RecordCount")
                Label8.Text = CStr(rows)
            End While
            'myreader.Close()
            'mycon.Close()
            exitlopp = rows
            myAccessReader.Close()
            strconss.Close()

            'Call conns()

            If rows <> 0 Then
                Dim ro As Integer = 0
                dtptEdit.Rows.Clear()

                'str_sql_user_select = "SELECT *  FROM Department "
                'str_sql_user_select = "SELECT * FROM Department where vDepartName  like '" & txtCCode.Text & "%'  "

                dtptEdit.Rows.Add(rows)
                'For Each i As String In Me.ListItems.Items(itmss).ToString

                'studentid = Me.ListItems.Items(itmss).ToString
                Call conns()
                ' str_sql_user_select = "SELECT *  FROM Department"

                str_sql_user_select = "select DEPARTMEMBER.vDepartName,DEPARTMEMBER.vDepartCode,DEPARTMEMBER.dDate,DEPARTMEMBER.Id,DEPARTMEMBER.vHeadofDepartId,CHURCH.vSurname,CHURCH.vFname,CHURCH.vMobile,CHURCH.vMemberId from CHURCH INNER JOIN [DEPARTMEMBER]  On CHURCH.vMemberId = DEPARTMEMBER.vMemberId where DEPARTMEMBER.vDepartName  = '" & ComboBox1.Text & "' "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                ' dt.Columns.Add("description", GetType(String))

                'If dr.Read.Equals(True) Then
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vFname")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vHeadofDepartId")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("dDate")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("id")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1
                    itmss += 1
                    'End If
                End While
                'If exitlopp = itmss Then
                'Exit For
                'End If
                ' Next
                strconss.Close()
                ' mycon.Close()
                exitlopp = 0



                'Call conns()
                'ComboBox1.Enabled = False


            End If
            Label8.Visible = True

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Call lstme()
        Call requery()

    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try


            Dim NoDpt As Integer = 0
            Dim ro As Integer = 0
            Dim sqlString As String = ""
            If txtCode <> "" Then



                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DEPARTMEMBER] where vDepartCode ='" & txtCode & "' and vMemberId ='" & vMemb & "'"

                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim rows As Integer
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                If rows <> 0 Then
                    MsgBox("Member Existed Already", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If





                Dim code As String = ""
                Dim idss As Integer = 0
                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DEPARTMEMBER] "

                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                code = dtptEdit.Rows(ro).Cells(1).Value
                idss = CInt(dtptEdit.Rows(ro).Cells(8).Value)
                While rows > ro
                    If id = idss Then
                        For i As Integer = 0 To dtptEdit.RowCount - 1




                            sqlString = "UPDATE  [DEPARTMEMBER] SET " & _
                             "[vDepartCode] = '" & dtptEdit.Rows(ro).Cells(0).Value & "' ," & _
                           "[vDepartName] = '" & dtptEdit.Rows(ro).Cells(1).Value & "'," & _
                            "[vHeadofDepartId] = '" & dtptEdit.Rows(ro).Cells(6).Value & " '," & _
                             "[dDate] = '" & dtptEdit.Rows(ro).Cells(7).Value & "'" & _
                             "where id =" & id & ""

                            'comUserSelect = New SqlCommand(sqlString, mycon)
                            'comUserSelect.ExecuteNonQuery()
                            comUserSelectS = New OleDbCommand(sqlString, strconss)
                            myAccessReader = comUserSelectS.ExecuteReader()



                        Next i


                    End If
                    ro += 1
                    idss = CInt(dtptEdit.Rows(ro).Cells(8).Value)
                    code = dtptEdit.Rows(ro).Cells(1).Value
                End While
                MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")

                ' mycon.Close()
                strconss.Close()
            End If
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        Try
            Dim ro As Integer = 0
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 1






            Dim rowsOrder As Integer = 0

            Dim studentid As String = ""
            If ComboBox1.Text = "" Then
                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   DepartMember "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                'mycon.Close()
                strconss.Close()
            End If

            If ComboBox1.Text <> "" Then
                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   DepartMember where vDepartName= '" & ComboBox1.Text & "'"
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                'mycon.Close()
                strconss.Close()
            End If

            Dim array_STId2(array_STId1) As String
            Dim array(array_STId1) As String
            Dim stid As String = ""


            If numbs_pay = 0 Then

                If ComboBox1.Text = "" Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *   FROM   DepartMember "

                    ' str_sql_user_select = "SELECT vSurname,vFname,vMobile FROM Church JOIN Department on Church.vMemberId= Department.vMemberId"

                    'str_sql_user_select = "SELECT vSurname,vFname,vMobile,vMemberId from Church where vMemberId =(Select vMemberId,vDepartName  from Department )"
                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vMemberId")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                            nos += 1
                            ro += 1
                            intJoe = ro
                        End While

                    End While

                    'mycon.Close()
                    strconss.Close()
                End If

                If ComboBox1.Text <> "" Then
                    Call conns()
                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *   FROM   DepartMember  where vDepartName  = '" & ComboBox1.Text & "'"

                    ' str_sql_user_select = "SELECT vSurname,vFname,vMobile FROM Church JOIN Department on Church.vMemberId= Department.vMemberId"

                    'str_sql_user_select = "SELECT vSurname,vFname,vMobile,vMemberId from Church where vMemberId =(Select vMemberId,vDepartName  from Department )"
                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vMemberId")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                            nos += 1
                            ro += 1
                            intJoe = ro
                        End While

                    End While

                    'mycon.Close()
                    strconss.Close()
                End If

            End If





            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            '  e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)
            e.Graphics.DrawString("CHURCH WORKERS DETAILS", headfont, Brushes.Black, X1 + 120, Y + 70)

            'Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            With PrintDocument1.DefaultPageSettings
                e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                .PaperSize.Width - .Margins.Right, Y + 95)
            End With

            '############# COURSE SELECTION
            If ComboBox1.Text = "" Then

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 110)

                e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 210), CInt(Y) + 110)

                e.Graphics.DrawString("DEPARTMENT NAME: ", tablefont, Brushes.Black, CInt(X1 + 300), CInt(Y) + 110)

                e.Graphics.DrawString("ROLE: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                ' e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                While intJoe > 0

                    For Each i As String In Me.ListItems.Items(itm).ToString

                        studentid = Me.ListItems.Items(itm).ToString


                        Call conns()

                        'str_sql_user_select = "SELECT  *  FROM  Church where   vMemberId='" & studentid & "'"

                        str_sql_user_select = "select  DepartMember.vDepartName,DepartMember.vHeadofDepartId,Church.vSurname,Church.vFname,Church.vMobile from CHURCH INNER JOIN [DepartMember]  On CHURCH.vMemberId = DepartMember.vMemberId where DepartMember.vMemberId='" & studentid & "' "




                        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                        'myreader = comUserSelect.ExecuteReader()

                        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        While myAccessReader.Read
                            numbs_pay += 1
                            intJoe -= 1
                            e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                            'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                            'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                            e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 125), CInt(Y) + 130)


                            e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 210), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vDepartName"), titlefont, Brushes.Black, CInt(X1 + 300), CInt(Y) + 130)





                            e.Graphics.DrawString(myAccessReader("vHeadofDepartId"), titlefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 130)




                            ' e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                            ro += 1

                            count_pay += 1
                            ctr_pay += 1
                            itm += 1

                            If itm = rowsOrder Then
                                itm = 0
                                counts_pay = 0
                                count_pay = 0
                                numbs_pay = 0
                                ctr_pay = 0
                                nos = 0
                                e.HasMorePages = False
                                Exit For
                            End If

                            If count_pay >= 16 Then
                                e.HasMorePages = True
                                counts_pay += count_pay

                                count_pay = 0
                                Exit Sub
                            Else
                                e.HasMorePages = False
                                'counts = 0
                            End If
                            If count_pay = 0 Then
                                e.HasMorePages = False
                            End If



                        End While


                    Next
                End While
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If


                'mycon.Close()
                strconss.Close()
            End If

            '####################  DEPARTMENT NAME
            If ComboBox1.Text <> "" Then

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 110)

                e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 210), CInt(Y) + 110)

                e.Graphics.DrawString("DEPARTMENT NAME: ", tablefont, Brushes.Black, CInt(X1 + 300), CInt(Y) + 110)

                e.Graphics.DrawString("ROLE: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                ' e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                While intJoe > 0

                    For Each i As String In Me.ListItems.Items(itm).ToString

                        studentid = Me.ListItems.Items(itm).ToString


                        Call conns()

                        'str_sql_user_select = "SELECT  *  FROM  Church where   vMemberId='" & studentid & "'"

                        str_sql_user_select = "select  DepartMember.vDepartName,DepartMember.vHeadofDepartId,Church.vSurname,Church.vFname,Church.vMobile from CHURCH INNER JOIN [DepartMember]  On CHURCH.vMemberId = DepartMember.vMemberId where DepartMember.vMemberId='" & studentid & "' AND DepartMember.vDepartName='" & ComboBox1.Text & "' "




                        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                        'myreader = comUserSelect.ExecuteReader()

                        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        While myAccessReader.Read
                            numbs_pay += 1
                            intJoe -= 1
                            e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                            'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                            'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                            e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 125), CInt(Y) + 130)


                            e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 210), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vDepartName"), titlefont, Brushes.Black, CInt(X1 + 300), CInt(Y) + 130)





                            e.Graphics.DrawString(myAccessReader("vHeadofDepartId"), titlefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 130)




                            ' e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                            ro += 1

                            count_pay += 1
                            ctr_pay += 1
                            itm += 1

                            If itm = rowsOrder Then
                                itm = 0
                                counts_pay = 0
                                count_pay = 0
                                numbs_pay = 0
                                ctr_pay = 0
                                nos = 0
                                e.HasMorePages = False
                                Exit For
                            End If

                            If count_pay >= 16 Then
                                e.HasMorePages = True
                                counts_pay += count_pay

                                count_pay = 0
                                Exit Sub
                            Else
                                e.HasMorePages = False
                                'counts = 0
                            End If
                            If count_pay = 0 Then
                                e.HasMorePages = False
                            End If



                        End While


                    Next
                End While
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If


                'mycon.Close()
                strconss.Close()

            End If


        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try






    End Sub

    Private Sub lst()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church] "

            ' str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Student] where vstudentid='" & TextBox16.Text & "' "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim numb As Integer
            While myAccessReader.Read
                numb = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private code As String




    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click
        printNo = 1
        Dim Choices As String = ""
        Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

        If Choices = vbYes Then




            lst()
            PrintBIll()
            code = ""
        End If
        intJoe = 0
    End Sub

    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
         
            If codes <> "" Then
                Dim Choices As String = ""

                Choices = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from DepartMember where vDepartCode ='" & codes & "' and id =" & id & ""

                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)
                    'myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()


                    MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Delete")


                    myAccessReader.Close()


                    Dim NoDpt As String = ""
                    Call conns()

                    str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & NoDpart & "'  "


                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    'myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()


                    While myAccessReader.Read()

                        NoDpt = CInt(myAccessReader("vNoOfDpt"))

                    End While
                    'mycon.Close()
                    myAccessReader.Close()
                    strconss.Close()
                    Call conns()
                    'Dim sqlString As String
                    'Dim NoDpt As Integer = 0
                    Dim NoDpt2 As Integer = 0
                    NoDpt2 = CInt(NoDpt)
                    NoDpt2 -= 1
                    NoDpt = NoDpt2
                    str_sql_user_select = "UPDATE  [Church] SET " & _
                            "vNoOfDpt='" & NoDpt & "'" & _
                            "where vMemberId ='" & NoDpart & "' "

                    'comUserSelect = New SqlCommand(sqlString, mycon)
                    'comUserSelect.ExecuteNonQuery()

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    strconss.Close()

                    ' mycon.Close()
                    strconss.Close()

                End If
            End If
            strconss.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butReset.Click
        ComboBox1.Text = ""
        TextBox1.Text = ""
        TextBox2.Text = ""
        dtptEdit.Rows.Clear()
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub


    Private dptcode As String
    Private txtCode As String

    Public Property AddDpt() As String
        Get
            Return dptcode
        End Get
        Set(ByVal value As String)
            dptcode = value
            txtCode = dptcode


            Try
                Dim sqlString As String = ""
                txtCourseName.Text = ""
                Call conns()

                str_sql_user_select = "SELECT * FROM  DepartMember where vDepartCode= '" & txtCode & "'"

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                Dim DepartName As String = ""

                While myAccessReader.Read()


                    DepartName = myAccessReader("vDepartName")



                    ro += 1

                End While
                If cel3 <> "" Then
                    dtptEdit.CurrentRow.Cells(0).Value = txtCode
                    dtptEdit.CurrentRow.Cells(1).Value = DepartName
                End If
                myAccessReader.Close()
                strconss.Close()
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property

End Class